<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::get('/orders', [OrderController::class, 'index'])->name('orders');
Route::get('add_order', [OrderController::class, 'add_order']);
Route::post('store', [OrderController::class, 'store']);

Route::put('approve/{id}', [OrderController::class, 'approve']);
Route::put('reject/{id}', [OrderController::class, 'reject']);
