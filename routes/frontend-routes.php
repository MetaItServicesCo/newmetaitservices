<?php

use Illuminate\Support\Facades\Route;

// ===========================
// Website Route
// ===========================

Route::get('/', function () {
    return view('frontend.pages.landing-page');
})->name('landing.page');

Route::get('/services', function () {
    return view('frontend.pages.services');
})->name('services.page');

Route::get('/main-services', function () {
    return view('frontend.pages.main-services');
})->name('main-services.page');

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

Route::get('/casestudy', function () {
    return view('frontend.pages.case-study');
})->name('case-study.page');

Route::get('/contact', function () {
    return view('frontend.pages.contact');
})->name('contact.page');
