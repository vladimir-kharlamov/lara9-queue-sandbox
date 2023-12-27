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
    public function __construct(Request $request)
    {
        $this->trackerPublicID = $request->get('public_id');
        $this->url = $request->get('url');
    }
    public function handle()
    {
        // To check failed_jobs table for exist fails
        //throw new \Exception("Error Processing the job", 1);

       $tracker = Tracker::query()->where('public_id', $this->trackerPublicID)->first();

        if ($tracker) {
            $hit = Hit::query()->create(['tracker_id' => $tracker->id, 'url' => $this->url]);
            $previousHit = Hit::query()->where('tracker_id', $tracker->id)
                ->orderBy('id', 'desc')
                ->skip(1)
                ->first();
            if ($previousHit) {
                $previousHit->seconds = $hit->created_at->diffInSeconds($previousHit->created_at);
                $previousHit->save();
                return $previousHit->seconds; /** @todo add field */
            }
            return 0;
        }
        return -1;
    }
}
