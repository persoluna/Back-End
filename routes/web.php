<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\BackupfiledownloadController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CounterController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\HeaderController;
use App\Http\Controllers\HeadingController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchemaDumpController;
use App\Http\Controllers\StaticseoController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TruncateTablesController;
use App\Http\Controllers\WhyChooseUsController;
use App\Livewire\SearchApplication;
use App\Livewire\SearchBanner;
use App\Livewire\SearchCounter;
use App\Livewire\SearchSubcategory;
use App\Livewire\SearchWhyChooseUs;
use Illuminate\Support\Facades\Route;

Route::post('/truncate-tables', [TruncateTablesController::class, 'truncateAllTables'])->name('truncate-tables');

Route::get('/schema-dump', [SchemaDumpController::class, 'dumpSchema'])->name('schema.dump');

// ! FOR TESTING PURPOSES ONLY DO NOT EXECUTE IF NOT SURE !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
Route::get('/tables', function () {
    return response()->json(config('database.schema.tables'));
});
Route::get('/back-upppppppppppp', [BackupController::class, 'createBackup'])->name('back.up');

// TODO LiveWire Search Components
Route::get('/search-application', SearchApplication::class);
Route::get('/search-banner', SearchBanner::class);
Route::get('/search-counter', SearchCounter::class);
Route::get('/search-whychooseus', SearchWhyChooseUs::class);
Route::get('/search-subcategory', SearchSubcategory::class);

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

Route::resource('headings', HeadingController::class);

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);

Route::resource('staticseos', StaticseoController::class);

Route::resource('menus', MenuController::class);

Route::resource('footers', FooterController::class);

Route::resource('headers', HeaderController::class);

Route::resource('blogs', BlogController::class);

Route::resource('missions', MissionController::class);

Route::resource('abouts', AboutController::class);

Route::resource('testimonials', TestimonialController::class);

Route::resource('clients', ClientController::class);

Route::resource('applications', ApplicationController::class);

Route::resource('counters', CounterController::class);

Route::resource('banners', BannerController::class);

Route::resource('subcategories', SubcategoryController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ! Backup SQL file donwload routes for each of the three latest backups
Route::get('/backups', [BackupfiledownloadController::class, 'downloadBackups'])->name('backups.index');
Route::get('/backups/download/{index}', [BackupfiledownloadController::class, 'downloadBackup'])->name('backups.download');

require __DIR__ . '/auth.php';
