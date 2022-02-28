<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Color\Http\Controllers\ColorController;

Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');


Route::get('color', 'ColorController@welcome');


Route::get('/admin/colors/Addcolor',[ColorController::class,'welcome']);

Route::get('/admin/colors/list',[ColorController::class,'getdata']);
Route::post('/admin/colors/list',[ColorController::class,'getdata']);
Route::get('/admin/colors/list',[ColorController::class,'show']);
// Route::get('changeStatus', 'UserController@changeStatus');
Route::get('/admin/colors/list',[ColorController::class,'show']);
Route::get('/admin/colors/changeStatus',[ColorController::class,'changeStatus']);

//edit
Route::get('/admin/colors/edit/{id}',[ColorController::class,'edit']);
Route::POST('/admin/colors/edit/{id}',[ColorController::class,'update']);

// delete
Route::get('/admin/colors/completedUpdate',[ColorController::class,'completedUpdate']);

//trash
Route::get('/admin/colors/trash',[ColorController::class,'trashshow']);

// Restore

Route::get('//admin/colors/completedUpdated',[ColorController::class,'completedUpdated']);

// Delete
Route::get('/admin/colors/delete/{id}',[ColorController::class,'destroy']);

//try
Route::get('try',[ColorController::class,'set']);

// Route::post('/admin/colors/check_availability',[ColorController::class,'check_availability']);


// uniquename
Route::get('/admin/colors/uniquename',[Colorcontroller::class,'uniquename']);
