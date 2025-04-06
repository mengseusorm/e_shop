<?php

use App\Http\Controllers\Frontend\ShopController;
use Tabuna\Breadcrumbs\Trail;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/shop', [ShopController::class, 'index'])
    ->name('shop.index');
