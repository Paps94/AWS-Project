<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ArtPiece>
 */
class ArtPieceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
          'title' => fake()->name(),
          'description' => Str::random(10),
          'artist' => fake()->name(),
          'no_of_past_owners' => fake()->numberBetween($min = 1, $max = 5),
          'type' => fake()->randomElement(['digital', 'physical']),
          'for_sale' => fake()->randomElement(['0', '1']),
          'creation_date' => fake()->date(),
          'value' => fake()->randomFloat(2, 2, 2),
          'user_id' => 1
        ];
    }
}
