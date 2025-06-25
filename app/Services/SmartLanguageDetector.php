<?php

namespace App\Services;

use ZipArchive;
use App\Models\Technology;

class SmartLanguageDetector
{
    private $detectionRules = [
        // Core Languages (always detect if present)
        'PHP' => [
            'extensions' => ['php'],
            'patterns' => ['<?php', 'namespace', 'use '],
            'priority' => 10
        ],
        'JavaScript' => [
            'extensions' => ['js', 'mjs'],
            'patterns' => ['function', 'const ', 'let ', 'var '],
            'priority' => 8
        ],
        'TypeScript' => [
            'extensions' => ['ts', 'tsx'],
            'patterns' => ['interface', 'type ', ': string', ': number'],
            'priority' => 9,
            'overrides' => ['JavaScript']
        ],
        'HTML5' => [
            'extensions' => ['html', 'htm'],
            'patterns' => ['<!DOCTYPE', '<html', '<head>', '<body>'],
            'priority' => 7
        ],
        'CSS3' => [
            'extensions' => ['css'],
            'patterns' => ['{', '}', 'display:', 'margin:', 'padding:'],
            'priority' => 6
        ],
        'Python' => [
            'extensions' => ['py'],
            'patterns' => ['def ', 'import ', 'from ', 'class '],
            'priority' => 9
        ],
        'Java' => [
            'extensions' => ['java'],
            'patterns' => ['public class', 'import java', 'package '],
            'priority' => 9
        ],
        
        // Preprocessors & Advanced CSS
        'SASS' => [
            'extensions' => ['scss', 'sass'],
            'patterns' => ['$', '@mixin', '@include', '&:', '@import'],
            'priority' => 8,
            'overrides' => ['CSS3'],
            'min_files' => 1
        ],
        
        // Frameworks (higher priority)
        'Laravel' => [
            'files' => ['artisan', 'composer.json'],
            'composer_deps' => ['laravel/framework'],
            'directories' => ['app/Http', 'resources/views', 'routes'],
            'priority' => 15
        ],
        'React.js' => [
            'extensions' => ['jsx', 'tsx'],
            'npm_deps' => ['react'],
            'patterns' => ['import React', 'from "react"', 'useState', 'useEffect'],
            'priority' => 12
        ],
        'Vue.js' => [
            'extensions' => ['vue'],
            'npm_deps' => ['vue'],
            'patterns' => ['<template>', '<script>', 'export default'],
            'priority' => 12
        ],
        'Node.js' => [
            'files' => ['package.json'],
            'npm_deps' => ['express', 'node'],
            'patterns' => ['require(', 'module.exports', 'process.env'],
            'priority' => 11
        ],
        
        // CSS Frameworks
        'Tailwind CSS' => [
            'files' => ['tailwind.config.js', 'tailwind.config.ts'],
            'npm_deps' => ['tailwindcss'],
            'patterns' => ['@tailwind', '@apply', 'tailwind'],
            'priority' => 10
        ],
        'Bootstrap' => [
            'npm_deps' => ['bootstrap'],
            'patterns' => ['bootstrap', 'btn-', 'container-', 'row', 'col-'],
            'priority' => 9
        ],
        
        // Libraries
        'jQuery' => [
            'npm_deps' => ['jquery'],
            'patterns' => ['$(', 'jQuery(', '.ready(', '.click('],
            'priority' => 8
        ],
        
        // Databases
        'MySQL' => [
            'extensions' => ['sql'],
            'patterns' => ['SELECT', 'INSERT', 'UPDATE', 'DELETE', 'CREATE TABLE'],
            'priority' => 7
        ],
        
        // Tools
        'Docker' => [
            'files' => ['Dockerfile', 'docker-compose.yml'],
            'patterns' => ['FROM ', 'RUN ', 'COPY ', 'EXPOSE '],
            'priority' => 8
        ]
    ];

    public function detectFromZip($zipPath)
    {
        $zip = new ZipArchive();
        if ($zip->open($zipPath) !== TRUE) {
            return [];
        }

        $analysis = $this->analyzeZip($zip);
        $zip->close();

        $detected = $this->runDetection($analysis);
        
        return Technology::whereIn('name', $detected)->pluck('id')->toArray();
    }

    private function analyzeZip($zip)
    {
        $analysis = [
            'files' => [],
            'extensions' => [],
            'contents' => [],
            'package_json' => null,
            'composer_json' => null,
            'directories' => []
        ];

        for ($i = 0; $i < $zip->numFiles; $i++) {
            $filename = $zip->getNameIndex($i);
            $analysis['files'][] = $filename;
            
            // Track directories
            $dir = dirname($filename);
            if ($dir !== '.') {
                $analysis['directories'][] = $dir;
            }
            
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if ($extension) {
                $analysis['extensions'][$extension] = ($analysis['extensions'][$extension] ?? 0) + 1;
            }

            // Read important files
            $basename = basename($filename);
            if ($this->shouldReadFile($basename, $extension)) {
                $content = $zip->getFromIndex($i);
                if ($content !== false && strlen($content) < 200000) {
                    $analysis['contents'][$filename] = $content;
                    
                    if ($basename === 'package.json') {
                        $analysis['package_json'] = json_decode($content, true);
                    } elseif ($basename === 'composer.json') {
                        $analysis['composer_json'] = json_decode($content, true);
                    }
                }
            }
        }

        return $analysis;
    }

    private function shouldReadFile($basename, $extension)
    {
        $importantFiles = ['package.json', 'composer.json', 'tailwind.config.js', 'Dockerfile'];
        $importantExts = ['php', 'js', 'ts', 'jsx', 'tsx', 'vue', 'scss', 'sass', 'css', 'html', 'py', 'java'];
        
        return in_array($basename, $importantFiles) || in_array($extension, $importantExts);
    }

    private function runDetection($analysis)
    {
        $scores = [];
        
        foreach ($this->detectionRules as $tech => $rules) {
            $score = $this->calculateScore($analysis, $rules);
            if ($score > 0) {
                $scores[$tech] = [
                    'score' => $score,
                    'priority' => $rules['priority'] ?? 5,
                    'overrides' => $rules['overrides'] ?? []
                ];
            }
        }

        // Apply overrides
        foreach ($scores as $tech => $data) {
            foreach ($data['overrides'] as $override) {
                unset($scores[$override]);
            }
        }

        // Sort by priority and score
        uasort($scores, function($a, $b) {
            if ($a['priority'] === $b['priority']) {
                return $b['score'] <=> $a['score'];
            }
            return $b['priority'] <=> $a['priority'];
        });

        return array_keys($scores);
    }

    private function calculateScore($analysis, $rules)
    {
        $score = 0;

        // Extension check
        if (isset($rules['extensions'])) {
            foreach ($rules['extensions'] as $ext) {
                if (isset($analysis['extensions'][$ext])) {
                    $score += $analysis['extensions'][$ext] * 10;
                }
            }
        }

        // File check
        if (isset($rules['files'])) {
            foreach ($rules['files'] as $file) {
                foreach ($analysis['files'] as $zipFile) {
                    if (basename($zipFile) === $file) {
                        $score += 20;
                        break;
                    }
                }
            }
        }

        // Directory check
        if (isset($rules['directories'])) {
            foreach ($rules['directories'] as $dir) {
                foreach ($analysis['directories'] as $zipDir) {
                    if (strpos($zipDir, $dir) !== false) {
                        $score += 15;
                        break;
                    }
                }
            }
        }

        // Package.json dependencies
        if (isset($rules['npm_deps']) && $analysis['package_json']) {
            $deps = array_merge(
                $analysis['package_json']['dependencies'] ?? [],
                $analysis['package_json']['devDependencies'] ?? []
            );
            foreach ($rules['npm_deps'] as $dep) {
                if (isset($deps[$dep])) {
                    $score += 25;
                }
            }
        }

        // Composer dependencies
        if (isset($rules['composer_deps']) && $analysis['composer_json']) {
            $deps = $analysis['composer_json']['require'] ?? [];
            foreach ($rules['composer_deps'] as $dep) {
                if (isset($deps[$dep])) {
                    $score += 25;
                }
            }
        }

        // Content patterns
        if (isset($rules['patterns'])) {
            foreach ($analysis['contents'] as $content) {
                foreach ($rules['patterns'] as $pattern) {
                    if (stripos($content, $pattern) !== false) {
                        $score += 5;
                    }
                }
            }
        }

        // Minimum files check
        if (isset($rules['min_files']) && isset($rules['extensions'])) {
            $fileCount = 0;
            foreach ($rules['extensions'] as $ext) {
                $fileCount += $analysis['extensions'][$ext] ?? 0;
            }
            if ($fileCount < $rules['min_files']) {
                $score = 0;
            }
        }

        return $score;
    }
}