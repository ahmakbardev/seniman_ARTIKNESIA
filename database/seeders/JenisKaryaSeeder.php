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
    public function run(): void
    {
        JenisKarya::query()->create(['nama' => 'Fine Art', 'gambar' => '/images/kategori/fine-art.png']);
        JenisKarya::query()->create(['nama' => 'Digital Art', 'gambar' => '/images/kategori/digital-art.png']);
    }
}
