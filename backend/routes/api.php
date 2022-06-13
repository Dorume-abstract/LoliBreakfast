<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\TypeController;
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

#region OrderItem 
Route::get('type', [TypeController::class, 'index']);
Route::get('type/{id}', [TypeController::class, 'show']);
Route::post('type',[TypeController::class, 'store']);
Route::put('type/{id}', [TypeController::class, 'update']);
Route::delete('type/{id}', [TypeController::class, 'delete']);
#endregion

#region tables
Route::post("table", [TablesController::class, 'store']);
#endregion