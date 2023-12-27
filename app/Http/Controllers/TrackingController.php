<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\TrackHitJob;

class TrackingController extends Controller
{
    public function track(Request $request)
    {
        TrackHitJob::dispatch($request);
        //return response()->json([$request->get('public_id')]);
    }
}
