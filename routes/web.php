<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\WhyChooseUsController;
use App\Livewire\SearchApplication;
use App\Livewire\SearchBanner;
use App\Livewire\SearchCounter;
use App\Livewire\SearchWhyChooseUs;
use Illuminate\Support\Facades\Route;

// ! LiveWire SearchBanner and SearchCounter
Route::get('/search-application', SearchApplication::class);
Route::get('/search-banner', SearchBanner::class);
Route::get('/search-counter', SearchCounter::class);
Route::get('/search-whychooseus', SearchWhyChooseUs::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/whychooseus', [WhyChooseUsController::class, 'index'])->name('whychooseus.index');
Route::get('/whychooseus/create', [WhyChooseUsController::class, 'create'])->name('whychooseus.create');
Route::post('/whychooseus', [WhyChooseUsController::class, 'store'])->name('whychooseus.store');
Route::get('/whychooseus/{whyChooseUsItem}', [WhyChooseUsController::class, 'show'])->name('whychooseus.show');
Route::get('/whychooseus/{whychooseus}/edit', [WhyChooseUsController::class, 'edit'])->name('whychooseus.edit');
Route::put('/whychooseus/{whyChooseUsItem}', [WhyChooseUsController::class, 'update'])->name('whychooseus.update');
Route::delete('/whychooseus/{whyChooseUsItem}', [WhyChooseUsController::class, 'destroy'])->name('whychooseus.destroy');

Route::resource('missions', MissionController::class);

Route::resource('abouts', AboutController::class);

Route::resource('testimonials', TestimonialController::class);

Route::resource('clients', ClientController::class);

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
