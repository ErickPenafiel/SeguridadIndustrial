<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Capacitacion>
 */
class CapacitacionFactory extends Factory
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
            'id_area' => $this->faker->numberBetween(1, 4),
            'nombre' => $this->faker->word(),
            'contenido' => $this->faker->text(),
            // 'tiempo' => $this->faker->numberBetween(1, 10),
            'fechaInicio' => $this->faker->dateTimeBetween('now', '+1 years')->format('Y-m-d'),
            'fechaFin' => $this->faker->dateTimeBetween('now', '+1 years')->format('Y-m-d'),
            'estado' => $this->faker->randomElement(['Aun no realizado', 'En proceso', 'Realizado']),
        ];
    }
}
