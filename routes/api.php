<?php

use App\Http\Controllers\Api\V1\PendingUpdateController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\RoomController;
use App\Http\Controllers\Api\V1\CampusController;
use App\Http\Controllers\Api\V1\BuildingController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::apiResources([
//     'buildings' => BuildingController::class
// ]);

Route::group(['prefix' => 'v1'], function(){
    Route::apiResource('buildings', BuildingController::class);
    Route::apiResource('campuses', CampusController::class);
    Route::apiResource('rooms', RoomController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('updates', PendingUpdateController::class);
});