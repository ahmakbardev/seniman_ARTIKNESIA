<?php

namespace Database\Seeders;

use App\Models\JenisKarya;
use App\Models\Paket;
use App\Models\Subkategori;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        // Tambahkan user admin
//        User::create([
//            'email'    => 'artiknesia.id@gmail.com',
//            'password' => Hash::make('Artiknesia.id123980'),
//            'role_id'  => 1, // Role ID untuk admin
//            'alamat'   => 'Malang, Indonesia', // Role ID untuk admin
//            'paket_id' => 1, // Role ID untuk admin
//        ]);
        User::query()->create([
            'name'              => 'admin',
            'username'          => 'admin',
            'email'             => 'admin@local.com',
            'password'          => Hash::make('adminadmin123123'),
            'role_id'           => 1,
            'alamat'            => 'Malang, Indonesia',
            'paket_id'          => 1,
            'email_verified_at' => now(),
        ]);
        User::query()->create([
            'name'              => 'artist',
            'username'          => 'artist',
            'email'             => 'art@local.com',
            'password'          => Hash::make('artart123123'),
            'role_id'           => 3,
            'alamat'            => 'Malang, Indonesia',
            'paket_id'          => Paket::query()->inRandomOrder()->first()->id,
            'email_verified_at' => now(),
            'id_seniman'        => mt_rand(1000, 9999),
            'jenis_karya'       => JenisKarya::query()->inRandomOrder()->first()->id,
            'subkategori'       => Subkategori::query()->inRandomOrder()->first()->id,
        ]);

        User::factory()->count(100)->create();
    }
}