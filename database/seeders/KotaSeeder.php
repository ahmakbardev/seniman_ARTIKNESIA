<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('kotas')->insert([
            ['nama' => 'Banda Aceh', 'provinsi_id' => 1], // 1 adalah ID Aceh
            ['nama' => 'Medan', 'provinsi_id' => 2], // 2 adalah ID Sumatera Utara
            // Tambahkan data kota lainnya sesuai kebutuhan
        ]);
    }
}
