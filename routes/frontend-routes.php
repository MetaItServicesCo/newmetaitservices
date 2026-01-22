<?php

use Illuminate\Support\Facades\Route;

// ===========================
// Website Route
// ===========================

Route::get('/', function () {
    $seoMeta = \App\Models\SeoMeta::where('page_name', 'landing')->where('is_active', 1)->first();

    return view('frontend.pages.landing-page', compact('seoMeta'));
})->name('landing.page');

Route::get('/services', [App\Http\Controllers\ServicesController::class, 'services'])->name('services');

Route::get('/service/{slug}', [App\Http\Controllers\ServicesController::class, 'service'])->name('service');

Route::get('/subservices', function () {
    return view('frontend.pages.subservices');
})->name('subservices.page');

Route::get('/about', function () {
    return view('frontend.pages.about');
})->name('about.page');

Route::get('/industry', function () {
    return view('frontend.pages.industry');
})->name('industry.page');

Route::get('/subindustry', function () {
    return view('frontend.pages.subindustry');
})->name('subindustry.page');

Route::get('/blogs', function () {
    return view('frontend.pages.blogs');
})->name('blogs.page');

Route::get('/blogsdetail', function () {
    return view('frontend.pages.blogsdetaile');
})->name('blogsdetaile.page');

Route::get('/portfolio', function () {
    return view('frontend.pages.portfolio');
})->name('portfolio.page');
