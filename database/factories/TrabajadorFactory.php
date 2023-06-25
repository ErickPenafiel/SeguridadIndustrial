<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trabajador>
 */
class TrabajadorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'ci'=>$this->faker->numberBetween(1000000,99999999),
            'nombre'=>$this->faker->firstName,
            'apellido'=>$this->faker->lastName,
            'fechaNacimiento'=>$this->faker->date,
            'id_area'=>$this->faker->numberBetween(1,4),
        ];
    }
}
