<?php

use App\Modules\Product\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Modules\Frontend\Http\Controllers\FrontendController;
Route::group(['prefix' => '/admin/products', 'middleware' => ['auth','isAdmin']], function () {

    Route::get('/addproduct', [ProductController::class, 'create']);
    Route::get('/insertproduct', [ProductController::class, 'insert']);
    Route::post('/insertproduct', [ProductController::class, 'insert']);
    Route::get('/listproduct', [ProductController::class, 'display']);
    Route::get('/editproduct/{id}', [ProductController::class, 'edit']);
    Route::post('/editproduct/{id}', [ProductController::class, 'update']);
    Route::get('/ChangeStatus', [ProductController::class, 'ChangeStatus']);
    Route::get('/delete', [ProductController::class, 'delete']);
    Route::get('/trashproduct', [ProductController::class, 'trash']);
    Route::get('/RestoreTrash', [ProductController::class, 'RestoreTrash']);
    // unique
    Route::get('/uniqueupc', [ProductController::class, 'uniqueupc']);
    Route::get('/uniqueproduct', [ProductController::class, 'uniqueproduct']);
    Route::get('/checkurl', [ProductController::class, 'checkurl']);
   
});
Route::get('products/{url}',[FrontendController::class,'details']);
