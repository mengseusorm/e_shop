<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\backend\CountryCodeController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\backend\MerchantController;
use App\Http\Controllers\backend\ProuductController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('admin.dashboard'));
    }); 

Route::get('/users', function () {
    return view('users');
});

/**
 * Category
 */
Route::get('/category',[CategoryController::class,'index'])->name('category')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.category'));
});
Route::get('/category-create',[CategoryController::class,'create'])->name('category.create')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.category.create'));
});
Route::post('/category-store',[CategoryController::class,'store'])->name('category.store')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.category.store'));
});
Route::get('/category-edit/{category}',[CategoryController::class,'edit'])->name('category.edit')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'));
});
Route::match(['put','patch','post'],'/category-update/{category}',[CategoryController::class,'update'])->name('category.update')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.category.update'));
});
Route::delete('/category-delete/{category}',[CategoryController::class,'destroy'])->name('category.destroy');
/**
 * merchant
 */
Route::get('/merchant',[MerchantController::class,'index'])
    ->name('merchant')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.merchant'));
});
Route::get('/merchant-create',[MerchantController::class,'create'])
    ->name('merchant.create')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.merchant.create'));
});
Route::post('/merchant-store',[MerchantController::class,'store'])
    ->name('merchant.store')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.merchant.store'));
});
Route::get('/merchant-edit/{merchant}',[MerchantController::class,'edit'])
    ->name('merchant.edit')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'));
});
Route::match(['patch','put','post'],'/merchant-update/{merchant}',[MerchantController::class,'update'])
    ->name('merchant.update')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.merchant.update'));
});
Route::delete('/merchant/{merchant}',[MerchantController::class,'destroy'])
    ->name('merchant.destory')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.merchant.destroy'));
});
/**
 * product
 */
Route::get('/product',[ProuductController::class,'index'])
    ->name('product')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.product'));
});
Route::get('/product-create',[ProuductController::class,'create'])->name('product.create')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.product.create'));
});
/**
 * country code
 */
Route::get('/country-code',[CountryCodeController::class,'index'])
    ->name('country.code')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.country.code'));
});
Route::get('/country-code-create',[CountryCodeController::class,'create'])
    ->name('country.code.create')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.country.code.create'));
});
Route::post('/country-store',[CountryCodeController::class,'store'])
    ->name('country.code.store')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.country.code.store'));
});
Route::get('/country-code-edit/{countryCode}',[CountryCodeController::class,'edit'])
    ->name('country.code.edit')
    ->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.country.code.edit','countryCode'));
});
Route::post('/country-code-update/{countryCode}',[CountryCodeController::class,'update'])
    ->name('country.code.update')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'));
});
Route::delete('/country-code-delete/{countryCode}',[CountryCodeController::class,'destroy'])->name('country.code.destroy');