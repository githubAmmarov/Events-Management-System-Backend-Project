<?php

use App\Http\Controllers\Api\Accessory\AccessoryController;
use App\Http\Controllers\Api\Accessory\AccessoryTypeController;
use App\Http\Controllers\Api\Event\EventController;
use App\Http\Controllers\Api\Food\FoodController;
use App\Http\Controllers\Api\Food\FoodCategoryController;
use App\Http\Controllers\Api\InvitationCardStyleController;
use App\Http\Controllers\Api\Order\InvitationCardController;
use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\Order\OrderController;
use App\Http\Controllers\Api\PhotographyTeamController;
use App\Http\Controllers\Api\Place\PlaceController;
use App\Http\Controllers\Api\Place\SubRoomController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Requests\Api\UpdateAccessoryRequest;
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
Route::post('registerAsPlanner',[AuthController::class,'registerAsPlanner']);
Route::post('login',[AuthController::class,'login']);
Route::post('adminLogin',[AuthController::class,'Adminlogin']);


Route::group(['middleware'=>['auth:api']], function(){
    Route::get('/profileInfo/{id}',[AuthController::class,'profile_Info']);
    Route::post('/logout',[AuthController::class,'logout']);

    Route::get('/listplacesbycategory',[PlaceController::class,'indexByCategory']);
    Route::get('/subRooms',[SubRoomController::class,'indexByPlace']);
    Route::get('showPlace/{place}',[PlaceController::class,'show']);
    Route::get('showSubroom/{subRoom}',[SubRoomController::class,'show']);
    Route::get('showSubroomReservations/{subRoom}/{month}/{year}',[ReservationController::class,'filter']);
    Route::post('/storePlace',[PlaceController::class, 'store']);
    Route::post('/storeSubRoom',[SubRoomController::class, 'store']);
    Route::delete('/deleteSubRoom/{id}',[SubRoomController::class, 'destroy']);
    Route::delete('/deletePlace/{id}',[PlaceController::class, 'destroy']);

    Route::post('/storemedia',[MediaController::class,'store']);

    
    // Route::get('/foodItem/{id}' ,[FoodItemController::class,'foodItem']);
    Route::get('/foodCategories' ,[FoodCategoryController::class,'index']);
    Route::get('/foodsForCategory/{id}' ,[FoodCategoryController::class,'foodsForCategory']);
    Route::post('/storeFood' ,[FoodController::class,'store']);
    Route::post('/updateFood/{id}' ,[FoodController::class,'update']);
    Route::delete('/deleteFood/{id}' ,[FoodController::class,'destroy']);





    Route::get('/accessoryItem/{id}',[AccessoryController::class, 'indexItem']);
    Route::get('/accessoriesForType/{id}',[AccessoryTypeController::class, 'indexForType']);
    Route::get('/accessoryTypes/{id}',[AccessoryTypeController::class, 'index']);
    Route::post('/storeAccessory', [AccessoryController::class, 'store']);
    Route::post('/updateAccessory/{id}', [AccessoryController::class, 'update']);
    Route::delete('/deleteAccessory/{id}', [AccessoryController::class, 'destroy']);
    
    Route::get('showInvitationCardStyle/{id}',[InvitationCardController::class, 'styleItem']);
    Route::post('storeInvitationCardStyle',[InvitationCardController::class, 'store']);
    Route::delete('deleteInvitationCardStyle/{id}',[InvitationCardController::class, 'destroy']);
    
    Route::get('allClients',[UserController::class, 'indexClients']);
    Route::get('blockedClients',[UserController::class, 'indexBlockedClients']);
    Route::get('allAvailablePlanners',[UserController::class, 'indexAvailablePlanners']);
    Route::get('bannedPlanners',[UserController::class, 'indexBannedPlanners']);
    
    
    Route::get('/allphotographyTeams', [PhotographyTeamController::class, 'index']);
    Route::get('/photographyTeam/{id}', [PhotographyTeamController::class, 'indexforID']);
    Route::post('/storePhotographyTeam', [PhotographyTeamController::class, 'store']);
    Route::delete('/deletePhotographyTeam/{id}', [PhotographyTeamController::class, 'destroy']);
    
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/showUserPost', [PostController::class, 'showUserPost']);
    Route::get('/ShowAnPost/{id}', [PostController::class, 'show']);
    Route::post('/storePost', [PostController::class, 'store']);
    Route::post('/updatePost/{id}', [PostController::class, 'update']);
    Route::delete('/deletePost/{id}', [PostController::class, 'destroy']);
    
    Route::get('/allEvents',[EventController::class, 'index']);
    
    Route::get('/publicEvents',[EventController::class, 'indexPublicEvents']);
    Route::get('/myEvents',[EventController::class, 'myEvents']);
    Route::get('/history',[EventController::class, 'myLastEvents']);
    
    Route::get('/eventTypes',[EventController::class, 'indexEventTypes']);
    Route::get('/showEvent/{id}',[EventController::class, 'show']);
    Route::post('/storeEvent',[EventController::class, 'store']);
    Route::post('/updateEvent/{event}',[EventController::class, 'update']);
    Route::delete('/deleteEvent/{event}',[EventController::class, 'destroy']);
    
    // api for admin
    Route::get('/showUserEvent/{id}',[EventController::class, 'userEvents']);
});
Route::get('allInvitationCardStyles',[InvitationCardStyleController::class, 'index']);
Route::get('allInvitationCards',[InvitationCardController::class, 'index']);

Route::get('/allAccessories',[AccessoryController::class, 'index']);
Route::get('/allAccessoryTypes',[AccessoryTypeController::class, 'index']);

Route::get('/allOrders',[OrderController::class, 'index']);

Route::get('/allFoods' ,[FoodController::class,'index']);
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

