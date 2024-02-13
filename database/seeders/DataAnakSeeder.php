<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataAnakSeeder extends Seeder
{
    public function run()
    {
        DB::table('anaks')->insert([
            'id_anak' => '1',
            'no_kk' => 1,
            'nama_anak' => 'John Doe',
            'tanggal_lahir' => '2000-01-01',
            'jenis_kelamin' => 'laki-laki',
            'nama_orangtua' => 'Jane Doe',
            'anak_ke' => 1,
            'alamat' => '123 Main St',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}