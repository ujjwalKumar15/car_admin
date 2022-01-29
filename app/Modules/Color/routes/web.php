<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Color\Http\Controllers\ColorController;
Route::get('color', 'ColorController@welcome');


Route::get('Addcolor',[ColorController::class,'welcome']);

Route::get('list',[ColorController::class,'getdata']);
Route::post('list',[ColorController::class,'getdata']);
Route::get('list',[ColorController::class,'show']);
// Route::get('changeStatus', 'UserController@changeStatus');
Route::get('checkstatus',[ColorController::class,'show']);
Route::get('changeStatus',[ColorController::class,'changeStatus']);

//edit
Route::get('edit/{id}',[ColorController::class,'edit']);
Route::POST('edit/{id}',[ColorController::class,'update']);

// delete
Route::get('completedUpdate',[ColorController::class,'completedUpdate']);

//trash
Route::get('trash',[ColorController::class,'trashshow']);

// Restore

Route::get('completedUpdated',[ColorController::class,'completedUpdated']);

// Delete
Route::get('delete/{id}',[ColorController::class,'destroy']);

//try
Route::get('try',[ColorController::class,'set']);