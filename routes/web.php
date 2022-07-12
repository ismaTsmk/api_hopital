<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalendarController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/getevent',[FullCalendarController::class,"getEvent"]);
Route::post('/createevent',[FullCalendarController::class,"createEvent"]);
Route::post('/deleteevent',[FullCalendarController::class,"deleteEvent"]);

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group(['middleware' => 'web'], function () {
        Route::get('/test',[FullCalendarController::class,"test"]);
});

