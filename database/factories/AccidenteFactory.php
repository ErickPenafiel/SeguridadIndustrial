<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Accidente>
 */
class AccidenteFactory extends Factory
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
            'fecha' => $this->faker->dateTimeBetween('2021-01-01', now())->format('Y-m-d'),
            'trabajador_id' => $this->faker->numberBetween(1, 10),
            'area_id' => $this->faker->numberBetween(1, 4),
            'severidad' => $this->faker->numberBetween(1, 5),
            'causa' => $this->faker->word(),
            'detalle' => $this->faker->word(),
            'responsable' => $this->faker->firstName(),
            'observaciones' => $this->faker->word(),
        ];
    }
}
