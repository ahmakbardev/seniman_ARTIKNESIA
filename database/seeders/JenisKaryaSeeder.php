<?php

namespace Database\Seeders;

use App\Models\JenisKarya;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKaryaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        JenisKarya::create(['nama' => 'Fine Art']);
        JenisKarya::create(['nama' => 'Digital Art']);
    }
}
