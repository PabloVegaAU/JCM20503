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
            'nivel' => $this->faker->randomElement($array = array('a', 'b', 'c')),
            'grado' => $this->faker->randomElement($array = array('a', 'b', 'c')),
            'seccion' => $this->faker->randomElement($array = array('a', 'b', 'c')),
            'turno' => $this->faker->randomElement($array = array('a', 'b', 'c')),
        ];
    }
}
