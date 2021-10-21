<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

class PatientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Patient::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = ['male', 'female'][rand(0, 1)];
        return [
            'name' => $this->faker->name($gender),
            'birthdate' => $this->faker->dateTimeInInterval('-70 years', '+60 years'),
            'gender' => $gender,
            'weight_kg' => rand(70.00, 300.00),
            'height_cm' => rand(120.0, 190.0),
            'observations' => $this->faker->text(rand(50, 400)),
        ];
    }
}
