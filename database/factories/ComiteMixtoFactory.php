<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ComiteMixto>
 */
class ComiteMixtoFactory extends Factory
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
            'miembro1' => $this->faker->numberBetween(1, 10),
            'miembro2' => $this->faker->numberBetween(1, 10),
            'miembro3' => $this->faker->numberBetween(1, 10),
            'miembro4' => $this->faker->numberBetween(1, 10),
            'fecha' => $this->faker->date(),
            'detalle' => $this->faker->text(),
            'observaciones' => $this->faker->text(),
        ];
    }
}
