<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keluarga')->insert([
                [
                    'anggota_keluarga' => 'ayah',
                    'nama_anggota_keluarga' => 'samsul',
                    'umur' => 34,
                    'agama' => 'islam'
                ],
                [
                    'anggota_keluarga' => 'ibu',
                    'nama_anggota_keluarga' => 'samiati',
                    'umur' => 30,
                    'agama' => 'islam'
                ],
                [
                    'anggota_keluarga' => 'adik',
                    'nama_anggota_keluarga' => 'Jlun',
                    'umur' => 18,
                    'agama' => 'islam'
                ]
        ]);
    }
} 
