<?php

use Illuminate\Support\Facades\Route;
use App\modules\Frontend\Http\Controllers\FrontendController;



Route::get('/gridview',[FrontendController::class,'grid']);
Route::get('list',[FrontendController::class,'list']);
