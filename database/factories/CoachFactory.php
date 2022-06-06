<?php

namespace Database\Factories;

use App\Models\Coach;
use App\Models\Sport;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoachFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Coach::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory()->create(['role_id' => 2]),
            'sport_id' => Sport::all()->random(),
            'other_phone' => $this->faker->randomNumber(8),
            'url' => 'test'
        ];
    }
}
