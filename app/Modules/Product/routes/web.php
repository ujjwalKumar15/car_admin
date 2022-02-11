<?php

use App\Modules\Product\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('product', 'ProductController@welcome');

//

Route::get('/admin/products/addproduct',[ProductController::class,'welcome']);

Route::get('admin/products/insertproduct',[ProductController::class,'insertproduct']);

Route::post('admin/products/insertproduct',[ProductController::class,'insertproduct']);
Route::get('/admin/products/listproduct',[ProductController::class,'displayproduct']);
Route::get('/admin/products/editproduct/{id}',[ProductController::class,'edit']);
Route::post('/admin/products/editproduct/{id}',[ProductController::class,'update']);


