<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;

class BackupfiledownloadController extends Controller
{
    public function downloadBackups()
    {
        $files = Storage::disk('public')->files('backup');
        rsort($files); // Sort the files in descending order

        $backups = [];
        foreach ($files as $index => $file) {
            // Extract date from the filename
            preg_match('/\d{4}-\d{2}-\d{2}/', $file, $matches);
            $date = $matches[0];
            $monthName = date('F Y', strtotime($date));

            $backups[$index] = [
                'file' => $file,
                'month' => $monthName,
            ];
        }

        return view('backups.index', compact('backups'));
    }

    public function downloadBackup($index)
    {
        $files = Storage::disk('public')->files('backup');
        rsort($files); // Sort the files in descending order

        if (isset($files[$index])) {
            return Storage::disk('public')->download($files[$index]);
        }

        abort(404);
    }
}
