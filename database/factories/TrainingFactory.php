<?php

namespace Database\Factories;

use App\Models\Athlete;
use App\Models\Training;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TrainingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Training::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::where('role_id', '=', 2)->get()->random(),
            'athlete_id' => Athlete::all()->random(),
            'date' => $this->faker->date(),
            'type_training' => $this->faker->sentence(),
            'calification' => $this->faker->sentence(),
            'time' => $this->faker->sentence(),
            'level' => $this->faker->sentence(),
            'get_better' => $this->faker->sentence(),
            'planification' => $this->faker->sentence(),
            'lesion' => $this->faker->sentence(),
            'details' => $this->faker->sentence()
        ];
    }
}
