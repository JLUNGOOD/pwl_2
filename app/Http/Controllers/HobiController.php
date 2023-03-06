<?php

namespace App\Http\Controllers;

use App\Models\hobiModel;
use Illuminate\Http\Request;

class HobiController extends Controller
{
    public function index()
    {
        $hobi = hobiModel::all();
        return view('hobi')
        ->with('hobi', $hobi);
    }
}
