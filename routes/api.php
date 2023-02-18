<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ApiUserController;


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

Route::get('/product/search/{name}',[ProductController::class,'search']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/{id}',[ProductController::class,'show']);

Route::middleware('auth:sanctum')->group(function(){
    
    Route::post('/product',[ProductController::class,'store']);
    Route::put('/product/{id}',[ProductController::class,'update']);
    Route::delete('/product/{id}',[ProductController::class,'destroy']);
});


Route::post('/login',[ApiUserController::class,'index']);


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
