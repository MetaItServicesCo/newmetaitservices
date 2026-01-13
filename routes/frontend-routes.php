<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\BiomedServicesController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\InquiryController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\LocationPageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RepairServiceController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;

// ===========================
// Website Route
// ===========================


Route::get('/', function () {
    return view('frontend.pages.landing-page');
})->name('landing.page');