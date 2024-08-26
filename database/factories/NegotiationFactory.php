<?php

namespace Database\Factories;

use App\Models\NegotiationBatch;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Negotiation>
 */
class NegotiationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'              => User::query()->inRandomOrder()->value('id'),
            'negotiation_batch_id' => NegotiationBatch::query()->inRandomOrder()->value('id'),
            'artist_id'            => User::query()->inRandomOrder()->value('id'),
            'status'               => $this->faker->randomElement(['pending', 'accepted', 'rejected']),
            'price'                => $this->faker->numberBetween(10000, 10000000),
        ];
    }
}
