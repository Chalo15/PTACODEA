<?php

namespace Database\Factories;

use App\Models\Athlete;
use Illuminate\Database\Eloquent\Factories\Factory;

class AthleteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Athlete::class;

    /**
     * Define the model's default state.
     *            $table->id();

     * @return array
     */
    public function definition()
    {
        return [

            'emergency_contact' => $this->faker->randomNumber(),
            'policy' => $this->faker->unique()->sentence(),
            'coach_id' => $this->faker->randomElement(['1', '2', '3', '4']),
            'sport_id' => $this->faker->randomElement(['1', '2', '3', '4']),
            'user_id' => $this->faker->unique()->randomElement(['1', '2', '3', '4', '5', '6', '7', '8', '9', '10']),

        ];
    }
}
