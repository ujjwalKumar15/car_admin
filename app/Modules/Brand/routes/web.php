<?php

use Illuminate\Support\Facades\Route;
use App\modules\Brand\Http\Controllers\BrandController;

 Route::group(['prefix'=>'/admin/brands/','middleware'=>['auth','isAdmin']],function(){
Route::get('/Addbrand',[BrandController::class,'index']);
Route::get('/insertdata',[BrandController::class,'insert']);
Route::post('/Addbrand',[BrandController::class,'insert']);
Route::get('/brandlist',[BrandController::class,'show']);
Route::get('/editbrand/{id}',[BrandController::class,'edit']);
Route::post('/editbrand/{id}',[BrandController::class,'update']);
Route::get('/delete/{id}',[BrandController::class,'destroy']);
Route::get('/changebrandstatus',[BrandController::class,'changestatus']);
Route::get('/completedUpdatee',[BrandController::class,'deletestatus']);
Route::get('/trashbrand',[BrandController::class,'Trashshow']);
Route::get('/getrestore',[BrandController::class,'restore']);
Route::get('/uniquename',[BrandController::class,'uniquename']);
});