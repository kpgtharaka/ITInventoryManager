<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PeripheralType>
 */
class PeripheralTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return[
            'type'->$this->faker->randomElement(['Keyboard','Mouse','Printer','Scanner']),
            //'type'=>$this->faker->numberBetween(1,4),
            'description'=>$this->faker->regexify('[A-Z]{5}[0-4]{3}')
        ];
    }
}
