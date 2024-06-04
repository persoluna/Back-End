<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class BackupController extends Controller
{
    public function createBackup()
    {
        // Get the absolute path to the project's root directory
        $projectRoot = '/home/raza/Desktop/Projects/Back-end';

        // Run the schema dump command with the absolute path to artisan
        $process = new Process(['php', $projectRoot . '/artisan', 'schema:dump']);
        $process->run();

        // Check if the process ran successfully
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        // Define the path to the dumped SQL file
        $sourcePath = $projectRoot . '/database/schema/mysql-schema.sql';

        // Check if the file exists
        if (!file_exists($sourcePath)) {
            return response()->json(['error' => 'Schema dump file not found.'], 404);
        }

        // Generate a unique filename based on the current timestamp
        $timestamp = now()->format('Y-m-d_His');
        $filename = "mysql-schema-{$timestamp}.sql";

        // Define the destination path in the storage/app/public/backup folder
        $destinationPath = "backup/{$filename}";

        // Store the file in the storage/app/public/backup folder
        Storage::disk('public')->put($destinationPath, file_get_contents($sourcePath));

        // Get the list of backup files
        $files = Storage::disk('public')->files('backup');

        // Sort the files based on their creation time (newest first)
        usort($files, function ($a, $b) {
            return Storage::disk('public')->lastModified($b) - Storage::disk('public')->lastModified($a);
        });

        // If there are more than three backup files, delete the oldest one
        if (count($files) > 3) {
            Storage::disk('public')->delete($files[3]);
        }

        return response()->json(['message' => 'Backup created successfully.', 'filename' => $filename]);
    }
}
