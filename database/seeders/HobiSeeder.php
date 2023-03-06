<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HobiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hobi')->insert([
            [
                'nama_hobi' => 'Bermain bola',
                'alasan' => 'bermain bola sangat menyenangkan bisa membuat sehat badan'
            ],
            [
                'nama_hobi' => 'Bermain Game',
                'alasan' => 'Bermain Game sangat menyenangkan jika menang'
            ],
            [
                'nama_hobi'=>'bersepeda',
                'alasan' => 'Bersepedah membuat badan segar dan sehat'
            ]
        ]);
    }
}
