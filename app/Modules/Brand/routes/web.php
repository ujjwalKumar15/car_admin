<?php

use Illuminate\Support\Facades\Route;
use App\modules\Brand\Http\Controllers\BrandController;


Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');
 
Route::get('/admin/brands/Addbrand',[BrandController::class,'index']);
Route::get('/admin/brands/insertdata',[BrandController::class,'insert']);
Route::post('/admin/brands/Addbrand',[BrandController::class,'insert']);
Route::get('/admin/brands/brandlist',[BrandController::class,'show']);
Route::get('/admin/brands/editbrand/{id}',[BrandController::class,'edit']);
Route::post('/admin/brands/editbrand/{id}',[BrandController::class,'update']);
Route::get('/admin/brands/delete/{id}',[BrandController::class,'destroy']);
Route::get('/admin/brands/changebrandstatus',[BrandController::class,'changestatus']);
Route::get('/admin/brands/completedUpdatee',[BrandController::class,'deletestatus']);
Route::get('/admin/brands/trashbrand',[BrandController::class,'Trashshow']);
Route::get('/admin/brands/getrestore',[BrandController::class,'restore']);
Route::get('/admin/brands/uniquename',[BrandController::class,'uniquename']);