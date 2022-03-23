<?php

use App\Modules\Cart\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('products/cart',[CartController::class,'AddtoCart']);
Route::get('view',[CartController::class,'update_qty']);
Route::get('/cart/delete',[CartController::class,'delete']);

