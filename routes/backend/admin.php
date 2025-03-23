<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
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
}); ;
Route::get('/category-create',[CategoryController::class,'create'])->name('category.create')->breadcrumbs(function (Trail $trail) {
    $trail->push(__('Home'), route('admin.category.create'));
}); ;
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