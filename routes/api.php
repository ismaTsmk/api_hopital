<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FullCalendarController;

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





Route::group(['middleware' => 'web'], function () {
    Route::get('/test',[FullCalendarController::class,"test"]);
});


Route::get('/getevent',[FullCalendarController::class,"getEvent"]);
Route::post('/createevent',[FullCalendarController::class,"createEvent"]);
Route::post('/deleteevent',[FullCalendarController::class,"deleteEvent"]);

Route::post('/login', [AuthController::class, 'login']);
Route::get('/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

Route::post('/get_me_event', [AuthController::class, 'getMeEvent'])->middleware('auth:sanctum');

