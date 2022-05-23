<?php

namespace Database\Factories;

use App\Models\Athlete;
use App\Models\Coach;
use App\Models\Sport;
use App\Models\User;
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
        $bloods = config('general.bloods');
        $lateralities = config('general.lateralities');
        $categories = config('general.categories');
        $relationships = config('general.relationships');

        return [
            'user_id' => User::factory()->create(['role_id' => 4]),
            'sport_id' => Sport::all()->random(),
            'state' => $this->faker->randomElement(['A', 'R']),
            'blood' => $bloods[array_rand($bloods)],
            'laterality' => $lateralities[array_rand($lateralities)],
            'category' => $categories[array_rand($categories)],
            'name_manager' => $this->faker->name(),
            'lastname_manager' => $this->faker->lastName(),
            'manager' => $relationships[array_rand($relationships)],
            'identification_manager' => $this->faker->randomNumber(9),
            'contact_manager' => $this->faker->randomNumber(8),
            'policy' => $this->faker->unique()->randomNumber(8),
            'medical_opinion' => $this->faker->unique()->randomNumber(8),
        ];
    }
}
