<?php

use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\KpiSectionController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SeoMetaController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TestimonialController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TermsAndConditionsController;
use App\Http\Controllers\DisclaimerController;
use App\Http\Controllers\PrivacyPolicyController;
use App\Http\Controllers\BrandWeCarryController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CKEditor
    Route::post('/ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.upload');

    Route::name('user-management.')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
        Route::resource('/user-management/roles', RoleManagementController::class);
        Route::resource('/user-management/permissions', PermissionManagementController::class);
    });

    // ===========================
    // FAQs
    // ===========================
    Route::controller(FaqController::class)->prefix('admin/faqs')->as('admin-faqs.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    // ===========================
    // Testimonial
    // ===========================
    Route::controller(TestimonialController::class)->prefix('admin/testimonials')->as('admin.testimonials.')->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    // ===========================
    // Portfolios
    // ===========================
    Route::controller(PortfolioController::class)->prefix('admin/portfolios')->as('admin.portfolios.')->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{portfolio}/edit', 'edit')->name('edit');
        Route::put('/{portfolio}/update', 'update')->name('update');
        Route::delete('/{portfolio}/destroy', 'destroy')->name('destroy');
        Route::post('/remove-gallery-image', 'removeGalleryImage')->name('remove-gallery-image');
    });

    // ===========================
    // KPI Sections
    // ===========================
    Route::controller(KpiSectionController::class)->prefix('admin/kpi-sections')->as('admin.kpi-sections.')->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{kpiSection}/edit', 'edit')->name('edit');
        Route::put('/{kpiSection}/update', 'update')->name('update');
        Route::delete('/{kpiSection}/destroy', 'destroy')->name('destroy');
    });

    // ===========================
    // Category
    // ===========================
    Route::controller(CategoryController::class)->prefix('admin/category')->as('admin-category.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::post('/store', 'store')->name('store');
        Route::put('/{category}', 'update')->name('update');
        Route::delete('/{category}', 'destroy')->name('destroy');
    });

    // ===========================
    // Seo Meta
    // ===========================
    Route::controller(SeoMetaController::class)->prefix('admin/seo-meta')->as('admin-seo-meta.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{seoMeta}/edit', 'edit')->name('edit');
        Route::put('/{seoMeta}', 'update')->name('update');
        Route::delete('/{seoMeta}', 'destroy')->name('destroy');
    });

    // ===========================
    // General Setting
    // ===========================
    Route::controller(GeneralSettingController::class)->prefix('admin/general-setting')->as('admin-general.')->group(function () {
        Route::get('/', 'index')->name('settings');
        Route::post('/settings', 'update')->name('settings.update');
    });

    // ===========================
    // Services
    // ===========================
    Route::controller(ServicesController::class)->prefix('admin/services')->as('admin.services.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{service}/edit', 'edit')->name('edit');
        Route::put('/{service}', 'update')->name('update');
        Route::delete('/{service}', 'destroy')->name('destroy');
    });

    // ===========================
    // Sub Services
    // ===========================
    Route::controller(ServicesController::class)->prefix('admin/sub-services')->as('admin.sub-services.')->group(function () {
        Route::get('/', 'subServices')->name('list');
        Route::get('/create', 'subServiceCreate')->name('create');
        Route::post('/store', 'subServicestore')->name('store');
        Route::get('/{subService}/edit', 'subServiceedit')->name('edit');
        Route::put('/{subService}', 'subServiceupdate')->name('update');
        Route::delete('/{subService}', 'subServicedestroy')->name('destroy');
    });

    // ===========================
    // Teams
    // ===========================
    Route::controller(TeamController::class)->prefix('admin/teams')->as('admin.teams.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{team}/edit', 'edit')->name('edit');
        Route::put('/{team}', 'update')->name('update');
        Route::delete('/{team}', 'destroy')->name('destroy');
    });

    // ===========================
    // Industries
    // ===========================
    Route::controller(IndustryController::class)->prefix('admin/industries')->as('admin.industries.')->group(function () {
        Route::get('/', 'index')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{industry}/edit', 'edit')->name('edit');
        Route::put('/{industry}', 'update')->name('update');
        Route::delete('/{industry}', 'destroy')->name('destroy');
    });

    // ===========================
    // Blog
    // ===========================
    Route::controller(BlogController::class)->prefix('admin/blogs')->as('admin-blogs.')->group(function () {
        Route::get('/list', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/upload', 'upload')->name('upload');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
    });

    // ===========================
    // Privacy Policy
    // ===========================
    Route::controller(PrivacyPolicyController::class)->prefix('admin/privacy-policy')->as('admin-privacy-policy.')->group(function () {
        Route::get('/', 'index')->name('page');
        Route::post('/store', 'storeOrUpdate')->name('store');
    });

    // ===========================
    // Terms & Conditions
    // ===========================
    Route::controller(TermsAndConditionsController::class)->prefix('admin/terms-conditions')->as('admin-terms-conditions.')->group(function () {
        Route::get('/', 'index')->name('page');
        Route::post('/store', 'storeOrUpdate')->name('store');
    });

    // ===========================
    // Disclaimer
    // ===========================
    Route::controller(DisclaimerController::class)->prefix('admin/disclaimer')->as('admin-disclaimer.')->group(function () {
        Route::get('/', 'index')->name('page');
        Route::post('/store', 'storeOrUpdate')->name('store');
    });

    // ===========================
    // Branch We Carry Cards
    // ===========================
    Route::controller(BrandWeCarryController::class)->prefix('admin/brand-we-carry')->as('admin.brand-we-carry.')->group(function () {
        Route::get('/', 'list')->name('list');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/delete', 'destroy')->name('delete');
    });
});

Route::get('/error', function () {
    abort(500);
});

Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__.'/auth.php';

require __DIR__.'/frontend-routes.php';
