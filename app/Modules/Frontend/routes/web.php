<?php

use Illuminate\Support\Facades\Route;
use App\modules\Frontend\Http\Controllers\FrontendController;



// Route::get('/products/grid',[FrontendController::class,'grid']);

// Route::get('/products/list',[FrontendController::class,'list']);
Route::get('/products',[FrontendController::class,'filter']);
Route::get('products/{url}',[FrontendController::class,'details']);
Route::get('/qty',[FrontendController::class,'qty']);
Route::get('/filter/price',[FrontendController::class,'price_filter']);


//  Route::get('/filter/price',[FrontendController::class,'price_filter']);

 
