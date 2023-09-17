<?php

namespace Database\Factories;

use App\Models\Proprety;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PropretyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title'=>fake()->text(8),
            'description'=>fake()->text,
            'surface'=>fake()->numberBetween(20,1000),
        'rooms'=>fake()->numberBetween(0,6),
        'bedrooms'=>fake()->numberBetween(0,3),
            'floor' =>fake()->numberBetween(0,12),
            'price'=>fake()->numberBetween(100,10000),
        'city'=>fake()->text(8),
            'address'=>fake()->address(),
        'postal_code'=>fake()->numberBetween(0,1600),
        'sold'=>fake()->boolean(),


        ];
    }
}
