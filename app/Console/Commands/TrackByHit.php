<?php

namespace App\Console\Commands;

use Faker\Provider\Uuid;
use Illuminate\Console\Command;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;

class TrackByHit extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
//    protected $signature = 'hit:command {tracker_public_id}';
    protected $signature = 'track:hit';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Emulate Post request to track page by tracker_id';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
//        $trackerPublicId = $this->argument('tracker_public_id');
        $trackerPublicId = Uuid::uuid();
//        dd($trackerPublicId);
        $url = URL::to('/') . "/tracking/{$trackerPublicId}";
        dd($url);

        $response = Http::post($url, [
                'url' => 'some_url' . $trackerPublicId,
            ]);

        $responseData = $response->json();
        dd($responseData);
    }
}
