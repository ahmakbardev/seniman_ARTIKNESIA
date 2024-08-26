<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // ProvinsiSeeder::class,
            // KotaSeeder::class,
            ProvinsiKotaSeeder::class,
            RoleSeeder::class,
            PaketSeeder::class,
            JenisKaryaSeeder::class,
            SubkategoriSeeder::class,
            AdminUserSeeder::class,
            KaryaSeeder::class,
            // Tambahkan seeder lainnya jika ada
        ]);
    }
}
