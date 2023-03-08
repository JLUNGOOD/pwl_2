<?php

namespace App\Http\Controllers;

use App\Models\matkulModel;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    public function index(){
        $matkul=matkulModel::all();
        return view('matkul')
        ->with('matkul', $matkul);
    }
}
