<?php

namespace App\Http\Controllers;

use App\Models\keluargaModel;
use Illuminate\Http\Request;

class KeluargaController extends Controller
{
    public function index(){
        $keluarga = keluargaModel::all();
        return view('keluarga')
        ->with('keluarga', $keluarga);
    }
}
