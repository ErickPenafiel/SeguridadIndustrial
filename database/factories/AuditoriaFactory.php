<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Auditoria>
 */
class AuditoriaFactory extends Factory
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
            'entidad' => $this->faker->name(),
            'fecha' => $this->faker->date(),
            'observaciones' => $this->faker->text(),
            'responsable' => $this->faker->name(),
        ];
    }
}
