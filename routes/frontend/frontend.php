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

Route::get('cart', [AddToCartController::class, 'viewCart'])->name('cart.index');
Route::get('add-to-cart/{id}', [AddToCartController::class, 'addToCart'])->name('cart.add');
Route::get('remove-from-cart/{id}', [AddToCartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('checkout', [AddToCartController::class, 'checkout'])->name('cart.checkout');
Route::post('checkout', [AddToCartController::class, 'placeOrder'])->name('cart.placeOrder');