<?php

namespace Database\Factories;

use App\Models\Athlete;
use App\Models\Physio;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhysioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Physio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::where('role_id', '=', 5)->get()->random(),
            'athlete_id' => Athlete::all()->random(),
            'date' => $this->faker->date(),
            'sph' => $this->faker->sentence(),
            'app' => $this->faker->sentence(),
            'treatment' => $this->faker->paragraph(),
            'surgeries' => $this->faker->paragraph(),
            'fractures' => $this->faker->paragraph(),
            'session_start' => $this->faker->time(),
            'session_end' => $this->faker->time(),
            'inability' => $this->faker->date(),
            'count_session' => $this->faker->randomNumber(8),
            'severity' => $this->faker->sentence(),
            'details' => $this->faker->paragraph(3),
        ];
    }
}
