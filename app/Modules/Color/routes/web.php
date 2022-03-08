<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Color\Http\Controllers\ColorController;

Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');



Route::get('/admin/colors/Addcolor',[ColorController::class,'index']);
Route::get('/admin/colors/list',[ColorController::class,'insert']);
Route::post('/admin/colors/list',[ColorController::class,'insert']);
Route::get('/admin/colors/list',[ColorController::class,'view']);
Route::get('/admin/colors/edit/{id}',[ColorController::class,'edit']);
Route::POST('/admin/colors/edit/{id}',[ColorController::class,'update']);
Route::get('/admin/colors/delete/{id}',[ColorController::class,'destroy']);
Route::get('/admin/colors/changeStatus',[ColorController::class,'changeStatus']);
Route::get('/admin/colors/completedUpdate',[ColorController::class,'deletestatus']);
Route::get('/admin/colors/trash',[ColorController::class,'trashview']);
Route::get('//admin/colors/completedUpdated',[ColorController::class,'restore']);
Route::get('/admin/colors/uniquename',[Colorcontroller::class,'uniquename']);
