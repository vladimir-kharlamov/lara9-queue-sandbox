<?php

namespace App\Console\Commands;

use App\Models\Tracker;
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
//    Tracker: у каждого сайта будет свой уникальный трекер.
//    Сейчас нам просто нужно убедиться, что ID трекера является валидным
//    (то есть существует в базе данных) и уникальным.
//    Hit: каждый POST-запрос будет сохранен как «Hit»

        // Get random site_id from 10 faked rows
        $randomPublicId = Tracker::inRandomOrder()->first()->only('public_id');
        $url = URL::to('/') . "/api/tracking";
        $response = Http::post($url, [
                'url' => 'some_url/' . $randomPublicId['public_id'],
                'public_id' => $randomPublicId['public_id'],
        ]);
        if ($response->status() === 200) {
            $this->info('POST request sent successfully');
            dd($response->body(), $response->object(), $response->json());
        } else {
            $this->error('Error sending POST request');
            dd($response->status(),$response->json());
        }
    }
}
