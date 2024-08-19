<?php

namespace Database\Seeders;

use App\Models\NegotiationBatch;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NegotiationBatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NegotiationBatch::factory(100)->create();
    }
}
