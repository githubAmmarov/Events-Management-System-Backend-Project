<?php

use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\Place\PlaceController;
use App\Http\Controllers\Api\Place\SubRoomController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('register',[AuthController::class,'register']);
Route::post('login',[AuthController::class,'login']);


Route::group(['middleware'=>['auth:api']], function(){
    
    Route::get('listplacesbycategory',[PlaceController::class,'index']);

    Route::get('subRooms',[SubRoomController::class,'index']);

    Route::post('logout',[AuthController::class,'logout']);
    
});
Route::post('storeimage',[MediaController::class,'store']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


