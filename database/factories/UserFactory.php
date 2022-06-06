<?php

namespace Database\Factories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $districts = config('general.districts');
        $genders = config('general.genders');

        return [
            'role_id' => $this->faker->randomElement([1, 4, 5]),
            'identification' => $this->faker->unique()->randomNumber(9),
            'password' => 'password', // password
            'name' => $this->faker->name(),
            'last_name' => $this->faker->lastName(),
            'birthdate' => now(),
            'phone' => $this->faker->unique()->randomNumber(8),
            'email' => $this->faker->unique()->safeEmail(),
            'district' => $districts[array_rand($districts)],
            'canton' => $this->faker->city(),
            'address' => $this->faker->address(),
            'gender' => $genders[array_rand($genders)],
            'condition' => $this->faker->randomElement(['A', 'I']),
            'contract_number' => $this->faker->randomNumber(),
            'contract_year' => $this->faker->randomNumber(),
            'experience' => $this->faker->randomNumber(),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
