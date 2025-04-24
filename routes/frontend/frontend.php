<?php

use App\Http\Controllers\AddToCartController;
use App\Http\Controllers\Frontend\ShopController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/shop', [ShopController::class, 'index'])
    ->name('shop.index');
Route::get('/shop/{category}', [ShopController::class, 'category'])
    ->name('shop.category');


Route::post('/add-to-cart/{product}',[AddToCartController::class, 'addToCart'])
        ->name('add-to-cart');
Route::post('/show-product-order',[AddToCartController::class, 'showProductOrder'])
    ->name('show-product-order');