<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TablesController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
#region Food
Route::get('food', [FoodController::class, 'index']);
Route::get('food/{id}', [FoodController::class, 'show']);
Route::post('food',[FoodController::class, 'store']);
Route::put('food/{id}', [FoodController::class, 'update']);
Route::delete('food/{id}', [FoodController::class, 'delete']);
#endregion

#region tables
Route::post("table", [TablesController::class, 'store']);
#endregion

#region Order
Route::get('order', [OrderController::class, 'index']);
Route::get('order/{id}', [OrderController::class, 'show']);
Route::post('order',[OrderController::class, 'store']);
Route::put('order/{id}', [OrderController::class, 'update']);
Route::delete('order/{id}', [OrderController::class, 'delete']);
#endregion