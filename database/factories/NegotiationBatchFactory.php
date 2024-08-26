<?php

namespace Database\Factories;

use App\Models\Karya;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NegotiationBatch>
 */
class NegotiationBatchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'product_id' => Karya::query()->inRandomOrder()->value('id'),
            'batch'      => $this->faker->randomNumber(2),
            'finish_at'  => $this->faker->dateTimeBetween('2024-07-01', '2024-09-30'),
            'status'     => $this->faker->randomElement(['open', 'close']),
        ];
    }
}
