<?php

use App\Http\Controllers\MyController;
use Illuminate\Support\Facades\Route;
use App\Mail\SampleMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// index
Route::get('/', function () {
    return view('index');
});

// create routes
Route::view('create','create');
Route::post('create_record',[MyController::class,'createRecord']);

// display record route
Route::get('/',[MyController::class,'showRecords']);

// edit record route
Route::get('edit/{id}',[MyController::class,'editRecordForm']);
Route::post('update_record',[MyController::class,'updateRecord']);

// edit record route
Route::get('delete/{id}',[MyController::class,'deleteRecord']);
