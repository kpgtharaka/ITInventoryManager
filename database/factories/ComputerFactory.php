<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Computer>
 */
class ComputerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   
    public function definition(): array
    {
        return [
            'serial'=>$this->faker->regexify('[A-Z]{5}[0-4]{3}'),
            'make'=>$this->faker->randomElement(['Dell','HP','Lenovo']),
            'model'=>$this->faker->lexify('?????'),
            'mac_address'=> $this->faker->macAddress(),
            'purchased_date'=>$this->faker->date('Y-m-d'),
            'price'=> $this->faker->randomNumber(5)
        ];
    }
}
