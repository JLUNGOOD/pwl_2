<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Kendaraan')->insert([
            [
                'No_pol' => 'AG 1234 UU',
                'merk' => 'Honda',
                'jenis' => 'Beat',
                'tahun_buat' => '2017',
                'warna' => 'hitam'
            ],
            [
                'No_pol' => 'AG 5678 WW',
                'merk' => 'Honda',
                'jenis' => 'Vario',
                'tahun_buat' => '2020',
                'warna' => 'Merah'
            ],
            [
                'No_pol' => 'AG 5690 XX',
                'merk' => 'Honda',
                'jenis' => 'PCX',
                'tahun_buat' => '2021',
                'warna' => 'Putih'
            ]
        ]);
    }
}
