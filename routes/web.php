<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CategoryController::class, 'index']);
Route::get('/category/{category}', [CategoryController::class, 'detail']);


Auth::routes([
    'register' => false,
    'reset'    => false
]);


Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {

    Route::get('/', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('home');

    Route::group(['prefix' => 'category'], function () {
        Route::get('/list', [AdminCategoryController::class, 'index'])->name('admin-category-list');
        Route::get('/delete/{category}', [AdminCategoryController::class, 'delete'])->name('admin-category-delete');
        Route::get('/edit/{category}', [AdminCategoryController::class, 'edit'])->name('admin-category-edit');
        Route::post('/store', [AdminCategoryController::class, 'store'])->name('admin-category-store');
        Route::post('/update/{category}', [AdminCategoryController::class, 'update'])->name('admin-category-update');

        Route::get('/create', [AdminCategoryController::class, 'create'])->name('admin-category-create');
    });


    Route::group(['prefix' => 'products'], function () {
        Route::get('/list', [ProductController::class, 'index'])->name('admin-product-list');
        Route::get('/delete/{product}', [ProductController::class, 'delete'])->name('admin-product-delete');
        Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('admin-product-edit');
        Route::post('/store', [ProductController::class, 'store'])->name('admin-product-store');
        Route::post('/update/{product}', [ProductController::class, 'update'])->name('admin-product-update');

        Route::get('/create', [ProductController::class, 'create'])->name('admin-product-create');
    });
});
