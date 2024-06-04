<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class BackupfiledownloadController extends Controller
{
    public function downloadBackups()
    {
        $files = Storage::disk('public')->files('backup');
        rsort($files); // Sort the files in descending order

        $backups = [];
        foreach ($files as $index => $file) {
            $monthName = Carbon::createFromTimestamp(Storage::disk('public')->lastModified($file))->format('F Y');
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
