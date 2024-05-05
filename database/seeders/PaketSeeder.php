<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Paket::create([
            'nama' => 'Pemula',
            'harga' => 70000,
        ]);

        Paket::create([
            'nama' => 'Profesional',
            'harga' => 150000,
        ]);

        Paket::create([
            'nama' => 'Maestro',
            'harga' => 400000,
        ]);
    }
}
