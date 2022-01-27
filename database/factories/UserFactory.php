<?php

namespace Database\Factories;

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
        return [
            'role_id' => 7,
            'identification' => $this->faker->unique()->randomNumber(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name' => $this->faker->name(),
            'last_name' => $this->faker->name(),
            'birthdate' => now(),
            'phone' => $this->faker->randomNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'province' => $this->faker->sentence(),
            'city' => $this->faker->sentence(),
            'address' => $this->faker->sentence(),
            'gender' => $this->faker->randomElement(['F', 'M', 'O']),
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
