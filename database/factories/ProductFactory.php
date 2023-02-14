<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'code' => fake() -> regexify('[A-Za-z0-9]{5}'),
            'name' => fake() ->  words(2, true),
            'description' => fake() -> boolean() ? fake() -> text(100) : null,
            'price' => fake() -> randomNumber(5, false),
            'weight' => fake() -> randomNumber(5, false),
        ];
    }
}
