<?php

use App\Modules\Product\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('product', 'ProductController@welcome');

//

Route::get('/admin/products/addproduct',[ProductController::class,'welcome']);

Route::get('/admin/products/listproduct',[ProductController::class,'displayproduct']);