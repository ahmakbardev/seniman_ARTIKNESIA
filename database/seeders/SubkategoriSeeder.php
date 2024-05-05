<?php

namespace Database\Seeders;

use App\Models\Subkategori;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubkategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Subkategori untuk jenis karya "Fine Art"
        Subkategori::create(['nama' => 'Lukis', 'jenis_karya_id' => 1]);
        Subkategori::create(['nama' => 'Sketsa', 'jenis_karya_id' => 1]);
        Subkategori::create(['nama' => 'Mix Media', 'jenis_karya_id' => 1]);
        Subkategori::create(['nama' => 'Other', 'jenis_karya_id' => 1]);

        // Subkategori untuk jenis karya "Digital Art"
        Subkategori::create(['nama' => 'Grafis', 'jenis_karya_id' => 2]);
        Subkategori::create(['nama' => 'Ilustrasi', 'jenis_karya_id' => 2]);
        Subkategori::create(['nama' => 'Other', 'jenis_karya_id' => 2]);
    }
}
