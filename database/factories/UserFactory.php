<?php

namespace Database\Factories;

use App\Models\JenisKarya;
use App\Models\Paket;
use App\Models\Subkategori;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'username' => fake()->userName(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role_id' => mt_rand(1, 4),
            'alamat' => 'Malang, Indonesia',
            'paket_id' => Paket::query()->inRandomOrder()->first()->id,
            'id_seniman' => mt_rand(1000, 9999),
            'jenis_karya' => JenisKarya::query()->inRandomOrder()->first()->id,
            'subkategori' => Subkategori::query()->inRandomOrder()->first()->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn(array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
