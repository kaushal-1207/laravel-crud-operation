<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Dummy API
Route::get('dummyapi', [APIController::class, 'getDummyApiData']);

// Get Data From DB API routes
Route::get('devicedata',[APIController::class,'getDeviceData']);

// Get Data From DB API routes with parameters
Route::get('devicedata/{key}',[APIController::class,'getDeviceDataParams']);

// Add Device to DB API routes
Route::post('add_device',[APIController::class,'addDevice']);

// Add Device API routes
Route::post('edit_device',[APIController::class,'editDevice']);

// Delete Device API routes
Route::post('delete_device',[APIController::class,'removeDevice']);

// Search Device API routes
Route::get('search_device/{key}',[APIController::class,'searchDevice']);

// API Validation
Route::post('validateAPI',[APIController::class,'validAPI']);

// Resource API validation
Route::apiResource('resourceapi',ResorceAPIController::class);

// Laravel Sanctum Authentication API
Route::post('loginapi', [UserController::class, 'index']);

// Secure URL
Route::group(['middleware' => 'auth:sanctum'], function () {
    //All secure URL's
    // Get Data From DB API routes
    Route::get('devicedata', [APIController::class, 'getDeviceData']);

// // Get Data From DB API routes with parameters
    // Route::get('devicedata/{key}',[APIController::class,'getDeviceDataParams']);

    // Add Device to DB API routes
    Route::post('add_device', [APIController::class, 'addDevice']);

// // Add Device API routes
    // Route::post('edit_device',[APIController::class,'editDevice']);

// // Delete Device API routes
    // Route::post('delete_device',[APIController::class,'removeDevice']);

// // Search Device API routes
    // Route::get('search_device/{key}',[APIController::class,'searchDevice']);

// // API Validation
    // Route::post('validateAPI',[APIController::class,'validAPI']);

// // Resource API validation
    // Route::apiResource('resourceapi',ResorceAPIController::class);
});


Route::post('file_upload', [APIController::class, 'uploadFile']);

Route::post('login', [\App\Http\Controllers\PassportAPI\PassportAPIController::class,'login']);
Route::post('register', [\App\Http\Controllers\PassportAPI\PassportAPIController::class, 'register']);
Route::group(['middleware' => 'auth:api'], function(){
    Route::post('details', [\App\Http\Controllers\PassportAPI\PassportAPIController::class,'details']);
});
