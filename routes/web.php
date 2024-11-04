<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('categories', CategoryController::class);
Route::resource('subcategories', SubcategoryController::class);
Route::resource('products', ProductController::class);
Route::get('/category/{category}/{subcategory}', [ProductController::class, 'viewBySubcategory'])->name('products.by_subcategory');