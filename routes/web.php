<?php

use App\Http\Controllers\DashboardController;
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
use App\Http\Controllers\SeoController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\TruncateTablesController;
use App\Http\Controllers\WhyChooseUsController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\FAQController;
use App\Http\Controllers\AchievementController;
use App\Http\Controllers\AboutPointController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\GalleryCategoryController;
use App\Http\Controllers\BannerCategoryController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CareerInquiryController;
use App\Http\Controllers\GlobalPresenceController;
use App\Http\Controllers\SmtpSettingController;
use App\Http\Controllers\OtherSettingController;
use App\Http\Controllers\WhatsappSettingController;
use App\Http\Controllers\InfrastructureController;
use App\Http\Controllers\QualityControlController;
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
Route::get('/back-up', [BackupController::class, 'createBackup'])->name('back.up');

// TODO LiveWire Search Components
Route::get('/search-application', SearchApplication::class);
Route::get('/search-banner', SearchBanner::class);
Route::get('/search-counter', SearchCounter::class);
Route::get('/search-whychooseus', SearchWhyChooseUs::class);
Route::get('/search-subcategory', SearchSubcategory::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/seo', [SeoController::class, 'index'])->name('SEO.index');

Route::get('/user-counts', [WelcomeController::class, 'getUserCounts']);

Route::get('/whychooseus', [WhyChooseUsController::class, 'index'])->name('whychooseus.index');
Route::get('/whychooseus/create', [WhyChooseUsController::class, 'create'])->name('whychooseus.create');
Route::post('/whychooseus', [WhyChooseUsController::class, 'store'])->name('whychooseus.store');
Route::get('/whychooseus/{whyChooseUsItem}', [WhyChooseUsController::class, 'show'])->name('whychooseus.show');
Route::get('/whychooseus/{whychooseus}/edit', [WhyChooseUsController::class, 'edit'])->name('whychooseus.edit');
Route::put('/whychooseus/{whyChooseUsItem}', [WhyChooseUsController::class, 'update'])->name('whychooseus.update');
Route::delete('/whychooseus/{whyChooseUsItem}', [WhyChooseUsController::class, 'destroy'])->name('whychooseus.destroy');

// For Banner
Route::post('whychooseus/ckeditor/upload', [WhyChooseUsController::class, 'upload'])->name('whychooseus.ckeditor.upload');
Route::post('/whychooseus/images/deleteUnused', [WhyChooseUsController::class, 'deleteUnusedImagesOnUnload'])->name('whychooseus.images.deleteUnused');

Route::resource('headings', HeadingController::class);

Route::resource('products', ProductController::class);

Route::resource('categories', CategoryController::class);

Route::resource('staticseos', StaticseoController::class);

Route::resource('menus', MenuController::class);

Route::resource('footers', FooterController::class);

Route::resource('headers', HeaderController::class);

Route::resource('blogs', BlogController::class);

// For Blog
Route::post('blog/ckeditor/upload', [BlogController::class, 'upload'])->name('blog.ckeditor.upload');
Route::post('/blog/images/deleteUnused', [BlogController::class, 'deleteUnusedImagesOnUnload'])->name('blog.images.deleteUnused');

Route::resource('missions', MissionController::class);

Route::resource('abouts', AboutController::class);

Route::resource('testimonials', TestimonialController::class);

Route::resource('clients', ClientController::class);

Route::resource('applications', ApplicationController::class);

// For Application
Route::post('application/ckeditor/upload', [ApplicationController::class, 'upload'])->name('application.ckeditor.upload');
Route::post('/application/images/deleteUnused', [ApplicationController::class, 'deleteUnusedImagesOnUnload'])->name('application.images.deleteUnused');

Route::resource('counters', CounterController::class);

Route::resource('banners', BannerController::class);

// For Banner
Route::post('banner/ckeditor/upload', [BannerController::class, 'upload'])->name('banner.ckeditor.upload');
Route::post('/banner/images/deleteUnused', [BannerController::class, 'deleteUnusedImagesOnUnload'])->name('banner.images.deleteUnused');

Route::resource('subcategories', SubcategoryController::class);

Route::resource('faqs', FAQController::class);

Route::resource('achievements', AchievementController::class);

Route::resource('aboutpoints', AboutPointController::class);

Route::resource('galleries', GalleryController::class);

Route::resource('servicecategories', ServiceCategoryController::class);

Route::resource('services', ServiceController::class);

Route::resource('gallerycategories', GalleryCategoryController::class);

Route::resource('bannercategories', BannerCategoryController::class);

Route::resource('staffs', StaffController::class);

Route::resource('blogcategories', BlogCategoryController::class);

Route::resource('careers', CareerController::class);

Route::resource('careerinquiries', CareerInquiryController::class);

Route::get('/careerinquiries/{id}/download', [CareerInquiryController::class, 'downloadResume'])->name('careerinquiries.download');

Route::get('/careerinquiries/{id}/view', [CareerInquiryController::class, 'viewResume'])->name('careerinquiries.view');

Route::resource('globalpresences', GlobalPresenceController::class);

Route::get('/smtp-settings', [SmtpSettingController::class, 'index'])->name('smtp-settings.index');
Route::put('/smtp-settings/{smtpSetting}', [SmtpSettingController::class, 'update'])->name('smtp-settings.update');

// For email test button on the SMTP setting edit page-
Route::post('/smtp-settings/test', [SmtpSettingController::class, 'testEmail'])->name('smtp-settings.test');

Route::resource('othersettings', OtherSettingController::class);

Route::resource('whatsappsettings', WhatsappSettingController::class);

Route::resource('infrastructures', InfrastructureController::class);

Route::resource('qualitycontrols', QualityControlController::class);

Route::get('/dashboard', [DashboardController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ! Backup SQL file donwload routes for each of the three latest backups
Route::get('/backups', [BackupfiledownloadController::class, 'downloadBackups'])->name('backups.index');
Route::get('/backups/download/{index}', [BackupfiledownloadController::class, 'downloadBackup'])->name('backups.download');

// ! Excel Export and Import routes FOR TESTING ONLY !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

// ? Export and Import Banners
Route::get('banners-export', [BannerController::class, 'export'])->name('banners.export');
Route::post('banners-import', [BannerController::class, 'import'])->name('banners.import');

// ? Export and Import Counters
Route::get('counters-export', [CounterController::class, 'export'])->name('counters.export');
Route::post('counters-import', [CounterController::class, 'import'])->name('counters.import');

// ? Export and Import Applications
Route::get('applications-export', [ApplicationController::class, 'export'])->name('applications.export');
Route::post('applications-import', [ApplicationController::class, 'import'])->name('applications.import');

// ? Export and Import WhyChooseUs
Route::get('whychooseus-export', [WhyChooseUsController::class, 'export'])->name('whychooseus.export');
Route::post('whychooseus-import', [WhyChooseUsController::class, 'import'])->name('whychooseus.import');

// ? Export and Import clients
Route::get('clients-export', [ClientController::class, 'export'])->name('clients.export');
Route::post('clients-import', [ClientController::class, 'import'])->name('clients.import');

// ? Export and Import testimonials
Route::get('testimonials-export', [TestimonialController::class, 'export'])->name('testimonials.export');
Route::post('testimonials-import', [TestimonialController::class, 'import'])->name('testimonials.import');

// ? Export and Import categories
Route::get('categories-export', [CategoryController::class, 'export'])->name('categories.export');
Route::post('categories-import', [CategoryController::class, 'import'])->name('categories.import');

// ? Export and Import subcategories
Route::get('subcategories-export', [SubcategoryController::class, 'export'])->name('subcategories.export');
Route::post('subcategories-import', [SubcategoryController::class, 'import'])->name('subcategories.import');

// ? Export and Import products
Route::get('products-export', [ProductController::class, 'export'])->name('products.export');
Route::post('products-import', [ProductController::class, 'import'])->name('products.import');

// ? Export and Import blogs
Route::get('blogs-export', [BlogController::class, 'export'])->name('blogs.export');
Route::post('blogs-import', [BlogController::class, 'import'])->name('blogs.import');

require __DIR__ . '/auth.php';
