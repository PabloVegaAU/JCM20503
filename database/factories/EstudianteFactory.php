<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EstudianteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dt = $this->faker->dateTimeBetween($startDate = '-60 years', $endDate = '-18 years');
        $date = $dt->format("Y-m-d"); // 24-09-1994

        return [
            'nombres' => $this->faker->name(),
            'apellidos' => $this->faker->lastName(),
            'sexo' => $this->faker->randomElement(['m', 'f']),
            'dni' => $this->faker->unique()->randomNumber(8),
            'edad' => $this->faker->numberBetween(12,18),
            'fnacimiento' => $date,
            'ntelefono' => $this->faker->unique()->randomNumber(9),
            'direccion' => $this->faker->lastName(),
        ];
    }
}
