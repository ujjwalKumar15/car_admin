<?php

use App\Http\Controllers\HomeController;
use App\Modules\Frontend\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('profile', function () {
    // Only authenticated users may enter...
})->middleware('auth');


Route::middleware(['auth','isAdmin'])->get('admin/dashboard/', function () {
    return view('template');

})->name('dashboard');

// Route::get('/admin/dashboard', [HomeController::class, 'index'])->middleware('auth');
Route::get('/', [FrontendController::class, 'fronthome']);
