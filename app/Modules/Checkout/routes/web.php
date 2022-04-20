<?php

use App\Modules\Checkout\Http\Controllers\CheckoutController;
use Illuminate\Support\Facades\Route;


// Route::group(['prefix'=>'/checkout','middleware'=>['auth','isAdmin']],function()


Route::middleware(['auth'])->group(function(){



Route::get('/billing', 'CheckoutController@checkout_billing');
Route::post('/billing', 'CheckoutController@store_billing');
// Route::post('/billing', 'CheckoutController@checkout_billing');
Route::get('/shipping', 'CheckoutController@checkout_shipping');
Route::post('/shipping', 'CheckoutController@store_shipping');
Route::get('/document',[CheckoutController::class,'upload_document']);
Route::post('/document',[CheckoutController::class,'store_document']);
Route::get('/order', 'CheckoutController@checkout_order_review');
Route::post('/order', 'CheckoutController@store_order');
Route::get('payment', 'CheckoutController@checkout_payment');
Route::post('/payment', 'CheckoutController@store_payment');
Route::get('myorders', 'CheckoutController@myorders');
Route::get('/myorders_view/{id}','CheckoutController@myorder_view');


});








