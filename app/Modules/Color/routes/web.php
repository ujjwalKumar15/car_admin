<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Color\Http\Controllers\ColorController;

Route::group(['prefix'=>'/admin/colors','middleware'=>['auth']],function(){

    Route::get('/Addcolor',[ColorController::class,'index']);
Route::get('/list',[ColorController::class,'insert']);
Route::post('/list',[ColorController::class,'insert']);
Route::get('/list',[ColorController::class,'view']);
Route::get('/edit/{id}',[ColorController::class,'edit']);
Route::POST('/edit/{id}',[ColorController::class,'update']);
Route::get('/delete/{id}',[ColorController::class,'destroy']);
Route::get('/changeStatus',[ColorController::class,'changeStatus']);
Route::get('/completedUpdate',[ColorController::class,'deletestatus']);
Route::get('/trash',[ColorController::class,'trashview']);
Route::get('/completedUpdated',[ColorController::class,'restore']);
Route::get('/uniquename',[Colorcontroller::class,'uniquename']);
});
