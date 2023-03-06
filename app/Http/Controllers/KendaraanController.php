<?php

namespace App\Http\Controllers;

use App\Models\KendaraanModel;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    public function index(){
        $Kendaraan =KendaraanModel::all();
        return view('Kendaraan')
        ->with('Kendaraan', $Kendaraan);
    }
}
