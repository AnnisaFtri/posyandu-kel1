<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KepalaKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kepala_keluargas')->insert([
            'no_kk' => 1,
            'username' => 'john_doe',
            'nama_ayah' => 'John Doe Sr.',
            'alamat_ayah' => '123 Main St, Anytown',
        ]);
    }
}
