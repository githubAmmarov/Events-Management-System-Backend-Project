<?php

use App\Http\Controllers\Api\Accessory\AccessoryController;
use App\Http\Controllers\Api\Accessory\AccessoryTypeController;
use App\Http\Controllers\Api\Food\FoodController;
use App\Http\Controllers\Api\Food\FoodCategoryController;
use App\Http\Controllers\Api\Food\FoodItemController;
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


Route::group(['middleware'=>['auth:api']], function(){

Route::get('allFoods' ,[FoodController::class,'allFoods']);
Route::get('foodItem/{id}' ,[FoodItemController::class,'foodItem']);
Route::get('foodCategory/{id}' ,[FoodCategoryController::class,'foodCategory']);
Route::get('foodsForCategory/{id}' ,[FoodCategoryController::class,'foodsForCategory']);

Route::get('allAccessories',[AccessoryController::class, 'index']);
Route::get('accessoryItem/{id}',[AccessoryController::class, 'indexItem']);
Route::get('accessoriesForType/{id}',[AccessoryTypeController::class, 'indexForType']);
Route::get('accessoryTypes/{id}',[AccessoryTypeController::class, 'index']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


