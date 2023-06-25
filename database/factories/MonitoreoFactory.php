<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Monitoreo>
 */
class MonitoreoFactory extends Factory
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
            'fecha' => $this->faker->date(),
            'observaciones' => $this->faker->text(),
            'detalle' => $this->faker->text(),
            'responsable' => $this->faker->text(),
        ];
    }
}
