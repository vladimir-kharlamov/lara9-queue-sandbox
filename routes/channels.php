<?php

use Illuminate\Support\Facades\Broadcast;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});
//Route::post('/tracking/{tracker_public_id}', [\App\Http\Controllers\TrackingController::class, 'track']);
//Route::get('/tracking/{tracker_public_id}', [\App\Http\Controllers\TrackingController::class, 'track']);


