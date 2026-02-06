<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;


// ===========================
// Website Route
// ===========================

Route::get('/', function () {
    $seoMeta = \App\Models\SeoMeta::where('page_name', 'landing')->where('is_active', 1)->first();

    return view('frontend.pages.landing-page', compact('seoMeta'));
})->name('home');

Route::get('/services', [App\Http\Controllers\ServicesController::class, 'services'])->name('services');

Route::get('/service/{slug}', [App\Http\Controllers\ServicesController::class, 'service'])->name('service');

Route::get('/service/{serviceSlug}/{subServiceSlug}', [App\Http\Controllers\ServicesController::class, 'subService'])->name('service.subservice');

Route::get('/about-us', [App\Http\Controllers\AboutController::class, 'about'])->name('about-us');

Route::get('/industries',[App\Http\Controllers\IndustryController::class, 'industry'])->name('industries');

Route::get('/industry/{slug}', [App\Http\Controllers\IndustryController::class, 'industryDetail'])->name('industry.detail');

Route::get('/blogs', [App\Http\Controllers\BlogController::class, 'blogs'])->name('blogs.page');

Route::get('/blog/{slug}', [App\Http\Controllers\BlogController::class, 'blogDetail'])->name('blog.detail');

Route::get('/portfolio', [App\Http\Controllers\PortfolioController::class, 'portfolio'])->name('portfolio');
Route::get('/portfolio/{id}', [App\Http\Controllers\PortfolioController::class, 'portfolioDetail'])->name('portfolio.detail');

Route::get('/casestudy', [App\Http\Controllers\CaseStudyController::class, 'caseStudiesPage'])->name('case-study.page');

Route::get('/contact-us', function () {
    $seoMeta = \App\Models\SeoMeta::where('page_name', 'contact_us')->where('is_active', 1)->first();
    return view('frontend.pages.contact', compact('seoMeta'));
})->name('contact-us');

Route::get('/policy', [App\Http\Controllers\PrivacyPolicyController::class, 'policy'])->name('contact.policy');
Route::get('/term', [App\Http\Controllers\TermsAndConditionsController::class, 'term'])->name('contact.term');
    
Route::get('/disclaimer', [App\Http\Controllers\DisclaimerController::class, 'landingPage'])->name('contact.disclaimer');

// Sitemap routes
Route::get('/sitemap.xml', [App\Http\Controllers\SitemapController::class, 'sitemap'])->name('sitemap');
Route::get('/sitemap-index.xml', [App\Http\Controllers\SitemapController::class, 'sitemapIndex'])->name('sitemap.index');

Route::prefix('ajax')->group(function () {
    // Blog filter route
    Route::get('/blogs/filter', [BlogController::class, 'filterBlogs'])->name('blogs.filter');
    Route::post('/project/submit', [App\Http\Controllers\ProjectController::class, 'store'])->name('project.submit');
    Route::post('/service-inquiry/submit', [App\Http\Controllers\ServiceInquiryController::class, 'store'])->name('service-inquiry.submit');
    Route::post('/question/submit', [App\Http\Controllers\ProjectController::class, 'questionSubmit'])->name('question.submit');
    Route::post('/newsletter/subscribe', [App\Http\Controllers\ProjectController::class, 'subscribeNewsletter'])->name('newsletter.subscribe');
    Route::post('/contact/submit', [App\Http\Controllers\ProjectController::class, 'submitContact'])->name('contact.submit');
    Route::post('/case-study/download', [App\Http\Controllers\CaseStudyController::class, 'downloadCaseStudy'])->name('case-study.download');
    Route::get('/industries/load-more', [App\Http\Controllers\IndustryController::class, 'loadMore'])->name('industries.load-more');
});
