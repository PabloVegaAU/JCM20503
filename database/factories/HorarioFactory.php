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
            'dia' => $this->faker->randomElement($array = array('l', 'me', 'mi', 'j', 'v')),
            'hora_i' => $this->faker->time(),
            'hora_f' => $this->faker->time()
        ];
    }
}
