<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;


// ===========================
// Website Route
// ===========================

Route::get('/', function () {
    $seoMeta = \App\Models\SeoMeta::where('page_name', 'landing')->where('is_active', 1)->first();

    return view('frontend.pages.landing-page', compact('seoMeta'));
})->name('landing.page');

Route::get('/services', [App\Http\Controllers\ServicesController::class, 'services'])->name('services');

Route::get('/service/{slug}', [App\Http\Controllers\ServicesController::class, 'service'])->name('service');

Route::get('/service/{serviceSlug}/{subServiceSlug}', [App\Http\Controllers\ServicesController::class, 'subService'])->name('service.subservice');

Route::get('/about', [App\Http\Controllers\AboutController::class, 'about'])->name('about.page');

Route::get('/industries',[App\Http\Controllers\IndustryController::class, 'industry'])->name('industries');

Route::get('/industry/{slug}', [App\Http\Controllers\IndustryController::class, 'industryDetail'])->name('industry.detail');

Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'blogs'])->name('blogs.page');

Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'blogDetail'])->name('blog.detail');

Route::get('/portfolio', [App\Http\Controllers\PortfolioController::class, 'portfolio'])->name('portfolio.page');

Route::get('/casestudy', function () {
    return view('frontend.pages.case-study');
})->name('case-study.page');

Route::get('/contact', function () {
    return view('frontend.pages.contact');
})->name('contact.page');


Route::prefix('ajax')->group(function () {
    // Blog filter route
    Route::get('/blogs/filter', [BlogController::class, 'filterBlogs'])->name('blogs.filter');
});