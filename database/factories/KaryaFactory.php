<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Karya>
 */
class KaryaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::query()->inRandomOrder()->first()->id,
            'name' => $this->faker->sentence,
            'images' => json_encode([$this->faker->imageUrl(), $this->faker->imageUrl()]),
            'size_x' => $this->faker->randomFloat(2, 1, 100),
            'size_y' => $this->faker->randomFloat(2, 1, 100),
            'weight' => $this->faker->randomFloat(2, 1, 100),
            'material' => $this->faker->word,
            'philosophy' => $this->faker->paragraph,
            'price' => $this->faker->numberBetween(1000, 1000000),
            'stock' => $this->faker->numberBetween(0, 100),
            'category_id' => \App\Models\Subkategori::query()->inRandomOrder()->first()->id,
            'status' => 'pending',
        ];
    }
}
