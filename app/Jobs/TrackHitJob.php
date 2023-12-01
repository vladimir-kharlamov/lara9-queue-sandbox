<?php

namespace App\Jobs;

use App\Models\Hit;
use App\Models\Tracker;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class TrackHitJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $trackerPublicID;
    private $url;
    public function __construct($trackerPublicID, Request $request)
    {
        $this->trackerPublicID = $trackerPublicID;
        $this->url = $request->get('url');
        dd($trackerPublicID, $request);
    }
    public function handle()
    {
        throw new \Exception("Error Processing the job", 1);
        dd(2);
        $tracker = Tracker::query()->where('public_id', $this->trackerPublicID)->first();
        if ($tracker) {
            $hit = Hit::query()->create(['tracker_id' => $tracker->id, 'url' => $this->url]);
            $previousHit = Hit::query()->where('tracker_id', $tracker->id)->orderBy('id', 'desc')->skip(1)->first();
            if ($previousHit) {
                $previousHit->seconds = $hit->created_at->diffInSeconds($previousHit->created_at);
                $previousHit->save();
                return $previousHit->seconds;
            }
            return 0;
        }
        return -1;
    }
}
