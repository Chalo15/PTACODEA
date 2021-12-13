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

            'user_id' => $this->faker->unique()->randomElement(['15', '16', '17']),
            'sport_id' => $this->faker->randomElement(['1', '2', '3', '4']),
            'state' => $this->faker->randomElement(['P', 'A', 'I']),
            'blood' => $this->faker->randomElement(['A+', 'B+', 'AB+', 'O-']),
            'laterality' => $this->faker->randomElement(['D', 'I', 'A']),
            'name_manager' => $this->faker->sentence(),
            'lastname_manager' => $this->faker->sentence(),
            'identification_manager' => $this->faker->randomNumber(),
            'contact_manager' => $this->faker->randomNumber(),
            'policy' => $this->faker->randomNumber(),
            'manager' => "207910178",
        ];
    }
}
