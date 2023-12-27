<?php

use Illuminate\Support\Facades\Route;

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

//Route::post('/tracking/{tracker_public_id}', [\App\Http\Controllers\TrackingController::class, 'track']);
//Route::get('/tracking/{tracker_public_id}', [\App\Http\Controllers\TrackingController::class, 'track']);

Route::get('/', function () {
    return view('welcome');
});
