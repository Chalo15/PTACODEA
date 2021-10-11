<?php

namespace Database\Factories;

use App\Models\Coach;
use Illuminate\Database\Eloquent\Factories\Factory;

class CoachFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     * $table->unsignedBigInteger('user_id')->unique();
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

            'user_id' => $this->faker->unique()->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),
            'sport_id' => $this->faker->randomElement(['1', '2', '3', '4']),

        ];
    }
}
