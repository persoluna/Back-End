<?php

namespace App\Http\Controllers;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SchemaDumpController extends Controller
{
    public function dumpSchema()
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
        $path = $projectRoot . '/database/schema/mysql-schema.sql';

        // Check if the file exists
        if (!file_exists($path)) {
            return response()->json(['error' => 'Schema dump file not found.'], 404);
        }

        // Return the file as a download
        return response()->download($path, 'mysql-schema.sql');
    }
}
