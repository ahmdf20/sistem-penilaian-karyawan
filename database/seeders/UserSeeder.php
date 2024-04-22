<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            'uuid' => uuid_create(),
            'nama' => 'Project Manager',
            'email' => 'pm@company.com',
            'password' => Hash::make('PM123'),
            'no_telp' => '00122',
            'status' => 'aktif',
            'peran' => 'project-manager',
            'created_at' => now()
        ]);
        User::insert([
            'uuid' => uuid_create(),
            'nama' => 'Direktur Produksi 1',
            'email' => 'direktur-produksi@company.com',
            'password' => Hash::make('DP123'),
            'no_telp' => '00123',
            'status' => 'aktif',
            'peran' => 'direktur-produksi',
            'created_at' => now()
        ]);
        User::insert([
            'uuid' => uuid_create(),
            'nama' => 'Karyawan 1',
            'email' => 'karyawan1@company.com',
            'password' => Hash::make('KARYAWAN1'),
            'no_telp' => '0124',
            'status' => 'aktif',
            'peran' => 'karyawan',
            'created_at' => now()
        ]);
    }
}
