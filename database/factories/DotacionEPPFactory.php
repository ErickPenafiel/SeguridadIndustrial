<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DotacionEPP>
 */
class DotacionEPPFactory extends Factory
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
            'nombreDotacion'=>$this->faker->firstName,
            'id_area'=>$this->faker->numberBetween(1,4),
            'cantidad'=>$this->faker->numberBetween(1,100),
            'periodoDotacion'=>$this->faker->randomElement(['Mensual','Trimestral','Semestral','Anual']),
            'fechaDotacion'=>$this->faker->date(),
            'id_trabajador'=>$this->faker->numberBetween(1,50),
        ];
    }
}
