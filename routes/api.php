<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\CarController;
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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('cars',[CarController::class,'index']);
Route::get('cars/{id}',[CarController::class,'show']);
Route::post('cars/create',[CarController::class,'store']);
Route::post('cars/update/{id}',[CarController::class,'update']);
Route::post('cars/delete/{id}',[CarController::class,'delete']);
