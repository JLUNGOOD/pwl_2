<?php

namespace App\Http\Controllers;

use App\Models\Articles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\PDF;
// use PDF;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('articles.edit');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // return view('articles.create');
        return view('articles.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('image')){
            $image_name = $request->file('image')->store('image', 'public');
        }

        Articles::create([
            'title' => $request->title,
            'content' => $request->content,
            'featured_image' => $image_name,
        ]);
        return 'Artikel berhasil disimpan';
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function show(Articles $articles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $articles = Articles::find($id);
        return view('articles.edit',['article' => $articles]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $articles = Articles::find($id);

        $articles->title = $request->title;
        $articles->content = $request->content;

        if($articles->featured_image && file_exists(storage_path('app/public/'. $articles->featured_image))){
            Storage::delete('public/'. $articles->featured_image);
        }

        $image_name = $request->file('image')->store('images', 'public');
        $articles->featured_image = $image_name;

        $articles->save();
        return 'Artikel berhasil diubah';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Articles  $articles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Articles $articles)
    {
        //
    }

    public function cetak_pdf(Articles $articles){
        $articles = Articles::all();
        $pdf = PDF::loadview('articles.cetak_pdf',['articles' => $articles]);
        return $pdf->stream();
        
        //return view('articles.cetak_pdf', ['articles' => $articles]);
    }
}
