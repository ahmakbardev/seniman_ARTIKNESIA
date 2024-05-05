<?php

namespace Database\Seeders;

use App\Models\Provinsi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinsiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('provinsis')->insert([
            ['nama' => 'Aceh'],
            ['nama' => 'Sumatera Utara'],
            // Tambahkan data provinsi lainnya sesuai kebutuhan
        ]);
    }
}
