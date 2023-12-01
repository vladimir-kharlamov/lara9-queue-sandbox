<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\TrackHitJob;

class TrackingController extends Controller
{
    public function track($tracker_public_id, Request $request)
    {
//        dd(4);
        TrackHitJob::dispatch($tracker_public_id, $request);
    }
}
