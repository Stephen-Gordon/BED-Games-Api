<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\PlatformController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);


    /*  PROTECTED ROUTES  */
    Route::middleware('auth:sanctum')->group(function (){

    /*   AUTH    */
    Route::post('/auth/logout',[AuthController::class, 'logout']);
    Route::get('/auth/user',[AuthController::class, 'user']);


    /*   GAMES    */
    Route::apiResource('/games', GameController::class)->except((['index', 'show']));


    /*   STORES    */
    Route::apiResource('/stores', StoreController::class)->except((['index', 'show']));

    /*   PLATFORMS    */
    Route::apiResource('/platforms', PlatformController::class)->except((['index', 'show']));

});


    /*  GAMES    */
Route::get('/games', [GameController::class, 'index']);
Route::get('/games/{game}', [GameController::class, 'show']);

/*  STORES   */
Route::get('/stores', [StoreController::class, 'index']);
Route::get('/stores/{store}', [StoreController::class, 'show']);


Route::get('/platforms', [PlatformController::class, 'index']);
Route::get('/platforms/{platform}', [PlatformController::class, 'show']);
// This will define the route for Author, the implementation is not yet completed, so it's commented out.
// Route::resource('/authors', AuthorController::class)->only(['index', 'show']);