<?php

namespace Database\Factories;

use App\Models\Athlete;
use App\Models\Muscular;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class MuscularFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Muscular::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::where('role_id', '=', 6)->get()->random(),
            'athlete_id' => Athlete::all()->random(),
            'date' => $this->faker->date(),
            'physiological_age' => $this->faker->numerify('#.#'),
            'weight' => $this->faker->numerify('#.#'),
            'height' => $this->faker->numerify('#.#'),
            'bmi' => $this->faker->numerify('#.#'),
            'waist' => $this->faker->numerify('#.#'),
            'hip' => $this->faker->numerify('#.#'),
            'cint_code' => $this->faker->numerify('#.#'),
            'tricipital' => $this->faker->numerify('#.#'),
            'subscapular' => $this->faker->numerify('#.#'),
            'abdominal' => $this->faker->numerify('#.#'),
            'suprailiac' => $this->faker->numerify('#.#'),
            'thigh' => $this->faker->numerify('#.#'),
            'calf' => $this->faker->numerify('#.#'),
            'wrist' => $this->faker->numerify('#.#'),
            'elbow' => $this->faker->numerify('#.#'),
            'knee' => $this->faker->numerify('#.#'),
            'biceps' => $this->faker->numerify('#.#'),
            'calf_cm' => $this->faker->numerify('#.#'),
            'calories' => $this->faker->numerify('#.#'),
            'bmi_high' => $this->faker->numerify('#.#'),
            'icc_high' => $this->faker->numerify('#.#'),
            'fat' => $this->faker->numerify('#.#'),
            'residual' => $this->faker->numerify('#.#'),
            'bone' => $this->faker->numerify('#.#'),
            'muscle' => $this->faker->numerify('#.#'),
            'visceral' => $this->faker->numerify('#.#'),
            'ideal_weight' => $this->faker->numerify('#.#'),
            'get_better' => $this->faker->numerify('#.#'),
            'details' => $this->faker->paragraph(3),
        ];
    }
}
