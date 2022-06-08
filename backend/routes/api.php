<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodController;

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

#region 