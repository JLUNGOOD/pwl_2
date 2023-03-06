<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Home2Controller extends Controller
{
    public function home(){
        return view('home');
    }

    public function product()
    {
        return view('product');
    }

    public function news($id)
    {
        return view('news',['angka'=>$id]);
    }

    public function progam()
    {
        return view('progam');
    }

    public function about()
    {
        return view('about-us');
    }

    

}
