<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Dicky',
                'alamat' => 'Jl Kencono',
                'no_hp' => '08123456789',
                'role' => 'dokter',
                'email' => 'dicky123@gmail.com',
                'password' => bcrypt('password') // Enkripsi password
            ],
            [
                'name' => 'Isul',
                'alamat' => 'Jl itu',
                'no_hp' => '087654321',
                'role' => 'pasien',
                'email' => 'isul@gmail.com',
                'password' => bcrypt('password') // Enkripsi password
            ],
            [
                'name' => 'Pranata',
                'alamat' => 'Jalan',
                'no_hp' => '0812341123',
                'role' => 'dokter',
                'email' => 'pranata@gmail.com',
                'password' => bcrypt('password') // Enkripsi password
            ],
        ];

        foreach ($data as $d) {
            User::create($d);
        }
    }
}
