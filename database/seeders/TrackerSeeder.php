<?php

namespace Database\Seeders;

use App\Models\Tracker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrackerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Tracker::factory()->count(10)->create();
        Tracker::factory(10)
            ->create();
    }
}
