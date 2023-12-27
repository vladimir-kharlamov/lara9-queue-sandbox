<?php

namespace Database\Factories;

use App\Models\Tracker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tracker>
 */
class TrackerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tracker::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'public_id' => Str::uuid(),
            'created_at' => $this->faker->dateTimeBetween('-3 month', '-2 month'),
        ];
    }
}
