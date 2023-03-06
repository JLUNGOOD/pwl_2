<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     return "Selamat Datang";
    // }

    public function about(){
        return "Nama : Alwan Alawi Nim : 2141720178";
    }

    public function article($id)
    {
        return "Halaman Artikel dengan ID $id";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function product(){
        echo "List Product: <br>
        <ul>
            <li>
                <a href='https://www.educastudio.com/category/marbel-edu-games'>product 1</a>
            </li>
            <li>
                <a href='https://www.educastudio.com/category/marbel-and-friends-kids-games'>Product 2</a>
            </li>
            <li>
                <a href='https://www.educastudio.com/category/riri-story-books'>Product 3</a>
            </li>
            <li>
                <a href='https://www.educastudio.com/category/kolak-kids-songs'>Product 4</a>
            </li>
        </ul>
        ";
    }

    public function progam()
    {
        echo "List Progam: <br>
        <ul>
            <li>
                <a href='https://www.educastudio.com/program/karir'>progam 1</a>
            </li>
            <li>
                <a href='https://www.educastudio.com/program/magang'>Progam 2</a>
            </li>
            <li>
                <a href='https://www.educastudio.com/program/kunjungan-industri'>Progam 3</a>
            </li>
        </ul>
        ";
    }

    public function index(){
        return 'Laman Kontak Kami <br>
        <ul>
            <li>WHATS APP : 085257146203</li>
            <li>EMAIL : alwanalawi1@gmail.com</li>
        </ul>
        <label>kontak</label> <br>
        <input placeholder="Masukan Kontak">
        <button>Submit</button>
        ';
    }

}
