<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MantenimientoMaquinaria>
 */
class MantenimientoMaquinariaFactory extends Factory
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
            'nombre' => $this->faker->name(),
            'fecha' => $this->faker->date(),
            'responsable' => $this->faker->name(),
            'estado' => $this->faker->randomElement(['No realizado', 'Realizado']),
        ];
    }
}
