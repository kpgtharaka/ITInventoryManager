<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peripheral>
 */
class PeripheralFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type'=>$this->faker->numberBetween(1,4),
            'serial'=>$this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'make'=>$this->faker->randomElement(['Dell','HP','Lenovo']),
            'model'=>$this->faker->lexify('?????')
        ];
    }
}
