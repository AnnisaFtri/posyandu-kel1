<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('table_users')->insert([
            'username' => 'john_doe',
            'password' => Hash::make('123'),
            'foto' => 'your_foto',
            'role' => 'admin',
        ]);
    }
}
