<?php

use App\Http\Controllers\BackupController;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

Schedule::call(function () {
    (new BackupController)->createBackup();
})->lastDayOfMonth('15:00');
