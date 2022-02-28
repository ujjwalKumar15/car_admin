<?php

use App\Modules\Product\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/products/addproduct',[ProductController::class,'create']);
Route::get('admin/products/insertproduct',[ProductController::class,'insert']);
Route::post('admin/products/insertproduct',[ProductController::class,'insert']);
Route::get('/admin/products/listproduct',[ProductController::class,'display']);
Route::get('/admin/products/editproduct/{id}',[ProductController::class,'edit']);
Route::post('/admin/products/editproduct/{id}',[ProductController::class,'update']);
Route::get('/admin/products/ChangeStatus',[ProductController::class,'ChangeStatus']);
Route::get('/admin/products/delete',[ProductController::class,'delete']);
Route::get('/admin/products/trashproduct',[ProductController::class,'trash']);
Route::get('/admin/products/RestoreTrash',[ProductController::class,'RestoreTrash']);
// unique
Route::get('/admin/products/uniqueupc',[ProductController::class,'uniqueupc']);
Route::get('/admin/products/uniqueproduct',[ProductController::class,'uniqueproduct']);
Route::get('admin/products/checkurl',[ProductController::class,'checkurl']);

