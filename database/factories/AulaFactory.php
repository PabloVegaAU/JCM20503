<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AulaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nivel' => $this->faker->randomElement($array = array('p', 's')),
            'grado' => $this->faker->randomElement($array = array('1', '2', '3', '4', '5', '6')),
            'seccion' => $this->faker->randomElement($array = array('a', 'b', 'c')),
            'turno' => $this->faker->randomElement($array = array('m', 't')),
        ];
    }
}
