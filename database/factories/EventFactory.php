<?php

namespace Database\Factories;

use App\Models\Athlete;
use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

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
            'title' => $this->faker->sentence(),
            'description' => $this->faker->sentence(),
            'date' => $this->faker->date(),
            'start' => $this->faker->time(),
            'end' => $this->faker->time(),
            'state' => $this->faker->randomElement(['A', 'A', 'a']),

        ];
    }
}
