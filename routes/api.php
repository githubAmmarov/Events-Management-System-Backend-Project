<?php

use App\Http\Controllers\Api\Accessory\AccessoryController;
use App\Http\Controllers\Api\Accessory\AccessoryTypeController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\Food\FoodController;
use App\Http\Controllers\Api\Food\FoodCategoryController;
use App\Http\Controllers\Api\Food\FoodItemController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\PhotographyTeamController;
use App\Http\Controllers\Api\Place\PlaceController;
use App\Http\Controllers\Api\Place\SubRoomController;
use App\Http\Controllers\Api\PostController;
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

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);


Route::group(['middleware'=>['auth:api']], function(){
    Route::get('/profileInfo/{id}',[AuthController::class,'profile_Info']);
    Route::post('/logout',[AuthController::class,'logout']);


    Route::get('/listplacesbycategory',[PlaceController::class,'index']);
    Route::get('/subRooms',[SubRoomController::class,'index']);


});
Route::post('/storeimage',[MediaController::class,'store']);


Route::group(['middleware'=>['auth:api']], function(){

Route::get('/allFoods' ,[FoodController::class,'allFoods']);
Route::get('/foodItem/{id}' ,[FoodItemController::class,'foodItem']);
Route::get('/foodCategory/{id}' ,[FoodCategoryController::class,'foodCategory']);
Route::get('/foodCategories' ,[FoodCategoryController::class,'foodCategories']);
Route::get('/foodsForCategory/{id}' ,[FoodCategoryController::class,'foodsForCategory']);

Route::get('/allAccessories',[AccessoryController::class, 'index']);
Route::get('/accessoryItem/{id}',[AccessoryController::class, 'indexItem']);
Route::get('/accessoriesForType/{id}',[AccessoryTypeController::class, 'indexForType']);
Route::get('/accessoryTypes/{id}',[AccessoryTypeController::class, 'index']);
Route::get('/allAccessoryTypes',[AccessoryTypeController::class, 'allAccessoryTypes']);

Route::post('/storePost', [PostController::class, 'store']);
Route::post('/storeEvent',[EventController::class, 'store']);



Route::get('/allphotographyTeams', [PhotographyTeamController::class, 'index']);
Route::get('/photographyTeam/{id}', [PhotographyTeamController::class, 'indexforID']);



Route::get('/posts', [PostController::class, 'index']);
Route::post('/showUserPost', [PostController::class, 'showUserPost'])->middleware('api');
Route::get('/ShowAnPost/{id}', [PostController::class, 'show']);
Route::post('/updatePost/{id}', [PostController::class, 'update']);
Route::delete('/deletePost/{id}', [PostController::class, 'destroy']);


Route::get('/allEvents',[EventController::class, 'index']);
Route::get('/showUserEvent/{id}',[EventController::class, 'userEvents']);
Route::get('/showEvent/{id}',[EventController::class, 'show']);
Route::post('/updateEvent/{id}',[EventController::class, 'update']);
Route::delete('/deleteEvent/{id}',[EventController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

