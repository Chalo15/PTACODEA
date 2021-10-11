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
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'identification' => $this->faker->unique()->randomNumber(),
            'name' => $this->faker->name(),
            'birthdate' => now(),
            'phone' => $this->faker->randomNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'address' => $this->faker->sentence(),
            'gendet' => $this->faker->randomElement(['F', 'M', 'O']),
            'role_id' => $this->faker->randomElement(['1', '2']),
            'email_verified_at' => now(),
            // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     *             $table->id();
           
      
       

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
