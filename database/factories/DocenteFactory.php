<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DocenteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $dt = $this->faker->dateTimeBetween($startDate = '-17 years', $endDate = '-11 years');
        $date = $dt->format("Y-m-d"); // 24-09-2021

        return [
            'nombres' => $this->faker->name(),
            'apellidos' => $this->faker->lastName(),
            'sexo' => $this->faker->randomElement(['m', 'f']),
            'dni' => $this->faker->unique()->randomNumber(8),
            'edad' => $this->faker->numberBetween(25,50),
            'fnacimiento' => $date,
            'ntelefono' => $this->faker->unique()->randomNumber(9),
            'direccion' => $this->faker->lastName(),
        ];
    }
}
