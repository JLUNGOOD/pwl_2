<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $nama = 'Alwan Alawi';
        $kelas = 'TI-2B';
        $nim = 2141720178;
        $jurusan = 'Teknologi Informasi';
        return view('layouts.profile')
                    ->with('nama', $nama)
                    ->with('kelas', $kelas)
                    ->with('nim', $nim)
                    ->with('jurusan', $jurusan);
    }
    

}
