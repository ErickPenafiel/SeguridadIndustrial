<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FotoAuditoria>
 */
class FotoAuditoriaFactory extends Factory
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
            'foto' => $this->faker->name(),
            'auditoria_id' => $this->faker->numberBetween(1, 50),
        ];
    }
}
