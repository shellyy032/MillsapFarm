<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
        [
            'nama_pengguna' => 'Linda McMallend',
            'email' => 'linda@gmail.com',
            'password' => Hash::make('123456'),
            'id_role' => 1,
            'id_divisi' => 1,
        ],
        [
            'nama_pengguna' => 'Leonard Alvonso',
            'email' => 'le0nard@gmail.com',
            'password' => Hash::make('123456'),
            'id_role' => 2,
            'id_divisi' => 1,
        ],
    ]);
    }
}
