<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\backend\CountryCodeController;
use App\Http\Controllers\Backend\CurrencyController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\backend\MerchantController;
use App\Http\Controllers\backend\ProuductController;
use App\Http\Controllers\Backend\RateOnProductController;
use App\Http\Controllers\OrderController;
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
Route::post('/product-store',[ProuductController::class,'store'])->name('product.store')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.product.store'));
});
Route::get('/product-edit/{product}',[ProuductController::class,'edit'])->name('product.edit')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.product.edit','product'));
});
Route::post('/product-update/{product}',[ProuductController::class,'update'])->name('product.update')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.product.update','product'));
});
Route::get('/product-show/{product}',[ProuductController::class,'show'])->name('product.show')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.product.show','product'));
});
Route::delete('/product-delete/{product}',[ProuductController::class,'destroy'])->name('product.destroy');
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
    ->name('countrycode.store')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'));
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
/**
 * currency
 */
Route::get('/currency',[CurrencyController::class,'index'])
    ->name('currency')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.currency'));
});
Route::get('/currency-create',[CurrencyController::class,'create'])
    ->name('currency.create')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.currency.create'));
});
Route::post('/country-store',[CurrencyController::class,'store'])
    ->name('currency.store')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.currency.store'));
});
Route::get('/currency-edit/{currency}',[CurrencyController::class,'edit'])
    ->name('currency.edit')
    ->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.currency.edit','currency'));
});
Route::post('/currency-update/{currency}',[CurrencyController::class,'update'])
    ->name('currency.update')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'));
});
Route::delete('/currency-delete/{currency}',[CurrencyController::class,'destroy'])->name('currency.destroy');
/**
 * rate on product
 */
Route::get('/rate-on-product',[RateOnProductController::class,'index'])
    ->name('rate_on_product')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.rate_on_product'));
});

/**
 * orders
 */

Route::get('/orders',[OrderController::class,'index'])
    ->name('orders')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.orders'));
});