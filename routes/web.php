<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\ProfileController;
use App\Livewire\SearchApplication;
use App\Livewire\SearchBanner;
use App\Livewire\SearchCounter;
use Illuminate\Support\Facades\Route;

// ! LiveWire SearchBanner and SearchCounter
Route::get('/search-application', SearchApplication::class);
Route::get('/search-banner', SearchBanner::class);
Route::get('/search-counter', SearchCounter::class);

Route::get('/', function () {
    return view('welcome');
});

Route::resource('applications', ApplicationController::class);

Route::resource('counters', CounterController::class);

Route::resource('banners', BannerController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
