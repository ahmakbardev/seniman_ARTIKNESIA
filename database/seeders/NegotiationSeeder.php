<?php

namespace Database\Seeders;

use App\Models\Negotiation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NegotiationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Negotiation::factory(500)->create();
    }
}
