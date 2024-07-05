<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SeoController;
use App\Http\Controllers\BenefitController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('visitors-and-page-views', [SeoController::class, 'getVisitorsAndPageViews']);
Route::get('visitors-and-page-views-by-date', [SeoController::class, 'getVisitorsAndPageViewsByDate']);
Route::get('total-visitors-and-page-views', [SeoController::class, 'getTotalVisitorsAndPageViews']);
Route::get('most-visited-pages', [SeoController::class, 'getMostVisitedPages']);
Route::get('top-referrers', [SeoController::class, 'getTopReferrers']);
Route::get('user-types', [SeoController::class, 'getUserTypes']);
Route::get('top-browsers', [SeoController::class, 'getTopBrowsers']);
Route::get('top-countries', [SeoController::class, 'getTopCountries']);
Route::get('top-operating-systems', [SeoController::class, 'getTopOperatingSystems']);


Route::get('benefits/{id}', [BenefitController::class, 'demo']);