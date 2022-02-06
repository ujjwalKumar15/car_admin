<?php

use Illuminate\Support\Facades\Route;
use App\modules\Brand\Http\Controllers\BrandController;


Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');




// insert 
Route::get('/admin/brands/Addbrand',[BrandController::class,'welcome']);
Route::get('/admin/brands/insertdata',[BrandController::class,'insertdata']);
Route::post('/admin/brands/Addbrand',[BrandController::class,'insertdata']);

// view

Route::get('/admin/brands/brandlist',[BrandController::class,'show']);

// ChangeStatusBrand
Route::get('/admin/brands/changebrandstatus',[BrandController::class,'changebrandstatus']);

//edit
Route::get('/admin/brands/editbrand/{id}',[BrandController::class,'edit']);
Route::post('/admin/brands/editbrand/{id}',[BrandController::class,'update']);

//delete
Route::get('/admin/brands/completedUpdatee',[BrandController::class,'completedUpdatee']);

// trash
Route::get('/admin/brands/trashbrand',[BrandController::class,'trashbrand']);

//restore
Route::get('/admin/brands/getrestore',[BrandController::class,'getrestore']);

//delete
Route::get('/admin/brands/delete/{id}',[BrandController::class,'destroy']);

