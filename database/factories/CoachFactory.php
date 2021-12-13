<?php

namespace Database\Factories;

use App\Models\Coach;
use App\Models\User;
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

            'user_id' => User::factory()->create(),
            'sport_id' => 1,
            'phone' => User::factory()->create(),

        ];
    }
}
