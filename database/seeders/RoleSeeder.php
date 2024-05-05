<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Seed roles
        Role::create(['nama' => 'Admin']);
        Role::create(['nama' => 'Kreatif']);
        Role::create(['nama' => 'Seniman']);
        Role::create(['nama' => 'User']);
        // Tambahkan role lain jika diperlukan
    }
}
