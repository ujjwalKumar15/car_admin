<?php

use App\Modules\OrderMaster\Http\Controllers\OrderMasterController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => '/admin/orders', 'middleware' => ['auth', 'isAdmin']], function () {

    Route::get('', 'OrderMasterController@view');
    Route::get('/invoice/{id}', 'OrderMasterController@invoice_view');
    Route::get('/edit/{id}', [OrderMasterController::class, 'edit']);
    Route::POST('/edit/{id}', [OrderMasterController::class, 'update']);
});
