<?php

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
/*Route::post('/tracking/', function (Request $request) {
    $res = \App\Jobs\TrackHitJob::dispatch($request);
    return response()->json([$res, $request->get('url')]);
//    return response()->json(['message' => 'POST request received']);
});*/

Route::post('/tracking/', [\App\Http\Controllers\TrackingController::class, 'track']);
//Route::get('/tracking/{tracker_public_id}', [\App\Http\Controllers\TrackingController::class, 'track']);
