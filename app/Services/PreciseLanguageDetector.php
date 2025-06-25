<?php

namespace App\Services;

use ZipArchive;
use App\Models\Technology;

class PreciseLanguageDetector
{
    private $priorityRules = [
        // Framework detection has highest priority
        'frameworks' => [
            'Laravel' => [
                'required_files' => ['artisan', 'composer.json'],
                'composer_check' => 'laravel/framework',
                'directory_structure' => ['app/Http', 'resources/views']
            ],
            'React.js' => [
                'package_check' => 'react',
                'file_patterns' => ['jsx', 'tsx'],
                'content_patterns' => ['import React', 'from "react"']
            ],
            'Vue.js' => [
                'extensions' => ['vue'],
                'package_check' => 'vue',
                'content_patterns' => ['<template>', 'export default']
            ],
            'Tailwind CSS' => [
                'files' => ['tailwind.config.js', 'tailwind.config.ts'],
                'package_check' => 'tailwindcss',
                'content_patterns' => ['@tailwind', '@apply']
            ],
            'Bootstrap' => [
                'package_check' => 'bootstrap',
                'content_patterns' => ['bootstrap', 'btn-primary', 'container-fluid']
            ]
        ],
        // Language detection with specificity
        'languages' => [
            'PHP' => [
                'extensions' => ['php'],
                'required_patterns' => ['<?php'],
                'exclude_if' => [] // No exclusions
            ],
            'JavaScript' => [
                'extensions' => ['js', 'mjs'],
                'exclude_if_framework' => ['TypeScript'], // Don't detect if TS found
                'content_patterns' => ['function', 'const ', 'let ']
            ],
            'TypeScript' => [
                'extensions' => ['ts', 'tsx'],
                'content_patterns' => ['interface ', 'type ', ': string'],
                'overrides' => ['JavaScript'] // TS overrides JS
            ],
            'HTML5' => [
                'extensions' => ['html', 'htm'],
                'required_patterns' => ['<!DOCTYPE html>', '<html']
            ],
            'CSS3' => [
                'extensions' => ['css'],
                'exclude_if_framework' => ['SASS'], // Don't detect if SASS found
                'content_patterns' => ['{', '}', 'display:', 'margin:']
            ],
            'SASS' => [
                'extensions' => ['scss', 'sass'],
                'content_patterns' => ['$', '@mixin', '@include', '&:', '@import'],
                'overrides' => ['CSS3'], // SASS overrides CSS
                'min_files' => 2 // Need at least 2 SASS files to override CSS
            ],
            'Python' => [
                'extensions' => ['py'],
                'content_patterns' => ['def ', 'import ', 'from ']
            ]
        ]
    ];

    public function detectFromZip($zipPath)
    {
        $zip = new ZipArchive();
        if ($zip->open($zipPath) !== TRUE) {
            return [];
        }

        $fileAnalysis = $this->analyzeZipContents($zip);
        $zip->close();

        // Step 1: Detect frameworks first (highest priority)
        $detectedTechs = $this->detectFrameworks($fileAnalysis);
        
        // Step 2: Detect languages with exclusion rules
        $languages = $this->detectLanguagesWithRules($fileAnalysis, $detectedTechs);
        
        // Step 3: Merge results
        $allDetected = array_merge($detectedTechs, $languages);
        
        return Technology::whereIn('name', array_unique($allDetected))->pluck('id')->toArray();
    }

    private function analyzeZipContents($zip)
    {
        $analysis = [
            'files' => [],
            'extensions' => [],
            'contents' => [],
            'package_json' => null,
            'composer_json' => null
        ];

        for ($i = 0; $i < $zip->numFiles; $i++) {
            $filename = $zip->getNameIndex($i);
            $analysis['files'][] = $filename;
            
            $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
            if ($extension) {
                $analysis['extensions'][$extension] = ($analysis['extensions'][$extension] ?? 0) + 1;
            }

            // Read important files
            $basename = basename($filename);
            if (in_array($basename, ['package.json', 'composer.json']) || 
                in_array($extension, ['php', 'js', 'ts', 'jsx', 'tsx', 'vue', 'scss', 'sass'])) {
                
                $content = $zip->getFromIndex($i);
                if ($content !== false && strlen($content) < 100000) {
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

    private function detectFrameworks($analysis)
    {
        $detected = [];

        foreach ($this->priorityRules['frameworks'] as $framework => $rules) {
            if ($this->matchesFrameworkRules($analysis, $rules)) {
                $detected[] = $framework;
            }
        }

        return $detected;
    }

    private function detectLanguagesWithRules($analysis, $detectedFrameworks)
    {
        $detected = [];

        foreach ($this->priorityRules['languages'] as $language => $rules) {
            // Check exclusion rules
            if (isset($rules['exclude_if_framework'])) {
                $shouldExclude = false;
                foreach ($rules['exclude_if_framework'] as $excludeFramework) {
                    if (in_array($excludeFramework, $detectedFrameworks)) {
                        $shouldExclude = true;
                        break;
                    }
                }
                if ($shouldExclude) continue;
            }

            // Check if language should override others
            if (isset($rules['overrides'])) {
                foreach ($rules['overrides'] as $overrideLang) {
                    $detected = array_diff($detected, [$overrideLang]);
                }
            }

            if ($this->matchesLanguageRules($analysis, $rules)) {
                $detected[] = $language;
            }
        }

        return $detected;
    }

    private function matchesFrameworkRules($analysis, $rules)
    {
        // Check required files
        if (isset($rules['required_files'])) {
            foreach ($rules['required_files'] as $requiredFile) {
                $found = false;
                foreach ($analysis['files'] as $file) {
                    if (basename($file) === $requiredFile) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) return false;
            }
        }

        // Check composer dependencies
        if (isset($rules['composer_check']) && $analysis['composer_json']) {
            $require = $analysis['composer_json']['require'] ?? [];
            if (!isset($require[$rules['composer_check']])) {
                return false;
            }
        }

        // Check package.json dependencies
        if (isset($rules['package_check']) && $analysis['package_json']) {
            $deps = array_merge(
                $analysis['package_json']['dependencies'] ?? [],
                $analysis['package_json']['devDependencies'] ?? []
            );
            if (!isset($deps[$rules['package_check']])) {
                return false;
            }
        }

        // Check content patterns
        if (isset($rules['content_patterns'])) {
            $patternFound = false;
            foreach ($analysis['contents'] as $content) {
                foreach ($rules['content_patterns'] as $pattern) {
                    if (stripos($content, $pattern) !== false) {
                        $patternFound = true;
                        break 2;
                    }
                }
            }
            if (!$patternFound) return false;
        }

        return true;
    }

    private function matchesLanguageRules($analysis, $rules)
    {
        // Check extensions
        if (isset($rules['extensions'])) {
            $hasExtension = false;
            $fileCount = 0;
            foreach ($rules['extensions'] as $ext) {
                if (isset($analysis['extensions'][$ext]) && $analysis['extensions'][$ext] > 0) {
                    $hasExtension = true;
                    $fileCount += $analysis['extensions'][$ext];
                }
            }
            if (!$hasExtension) return false;
            
            // Check minimum files requirement
            if (isset($rules['min_files']) && $fileCount < $rules['min_files']) {
                return false;
            }
        }

        // Check required patterns
        if (isset($rules['required_patterns'])) {
            foreach ($rules['required_patterns'] as $pattern) {
                $found = false;
                foreach ($analysis['contents'] as $content) {
                    if (stripos($content, $pattern) !== false) {
                        $found = true;
                        break;
                    }
                }
                if (!$found) return false;
            }
        }

        return true;
    }
}