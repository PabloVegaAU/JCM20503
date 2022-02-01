<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class HorarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dia' => $this->faker->randomElement(['1', '2', '3', '4', '5']),
            'hora_i' => $this->faker->time('H:i'),
            'hora_f' => $this->faker->time('H:i')
        ];
    }
}
