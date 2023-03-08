<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('matkul')->insert([
            [
                'kode_matkul' => 'RP010',
                'nama_matkul' => 'RPL',
                'jumlah_sks' => 6,
                'nilai' => 80
            ],
            [
                'kode_matkul' => 'BS020',
                'nama_matkul' => 'Basis Data',
                'jumlah_sks' => 5,
                'nilai' => 84
            ],
            [
                'kode_matkul' => 'BI030',
                'nama_matkul' => 'Bahasa Inggris',
                'jumlah_sks' => 4,
                'nilai' => 75
            ]
        ]);
    }
}
