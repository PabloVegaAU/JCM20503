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
        $date = $dt->format("d-m-Y"); // 1994-09-24

        return [
            'sexo' => $this->faker->randomElement($array = array('m', 'f')),
            'dni' => $this->faker->unique()->randomNumber(8),
            'edad' => $this->faker->numberBetween(12,18),
            'fnacimiento' => $date,
            'ntelefono' => $this->faker->unique()->randomNumber(9),
            'direccion' => $this->faker->lastName(),
        ];
    }
}
