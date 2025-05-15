<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'am',
            'email' => 'am@gmail.com',
            'password' => bcrypt('am'),
            'hp' => '12345678',
            'Alamat' => 'payaraja',
            'remember_token' => Str::random(10),
        ]);
        DB::table('users')->insert([
            'name' => 'Ahmadi',
            'email' => 'ahmadi@gmail.com',
            'password' => bcrypt('1'),
            'hp' => '12345678',
            'Alamat' => 'payaraja',
            'remember_token' => Str::random(10),
        ]);
    }
}
