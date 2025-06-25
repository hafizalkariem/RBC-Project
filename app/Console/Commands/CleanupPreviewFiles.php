<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CleanupPreviewFiles extends Command
{
    protected $signature = 'preview:cleanup';
    protected $description = 'Clean up expired preview files';

    public function handle()
    {
        $tempDir = public_path('temp');
        
        if (!is_dir($tempDir)) {
            return;
        }

        $directories = glob($tempDir . '/preview_*', GLOB_ONLYDIR);
        $cleaned = 0;

        foreach ($directories as $dir) {
            $cleanupFiles = glob($dir . '/.cleanup_*');
            
            foreach ($cleanupFiles as $cleanupFile) {
                $timestamp = (int) str_replace($dir . '/.cleanup_', '', $cleanupFile);
                
                if (time() > $timestamp) {
                    $this->deleteDirectory($dir);
                    $cleaned++;
                    break;
                }
            }
        }

        $this->info("Cleaned up {$cleaned} expired preview directories.");
    }

    private function deleteDirectory($dir)
    {
        if (!file_exists($dir)) return;
        
        $files = array_diff(scandir($dir), ['.', '..']);
        foreach ($files as $file) {
            $path = $dir . '/' . $file;
            is_dir($path) ? $this->deleteDirectory($path) : unlink($path);
        }
        rmdir($dir);
    }
}