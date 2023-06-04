<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\MahasiswaMatakuliahModel;
use App\Models\MahasiswaModel;
use App\Models\ProdiModel;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\VarDumper\Cloner\Data as ClonerData;
use Yajra\DataTables\DataTables;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('mahasiswa.Mahasiswa');
    
    }
    public function data()
    {
        $data = MahasiswaModel::selectRaw('id, nim, nama, hp');

        return DataTables::of($data)
                    ->addIndexColumn()
                    ->make(true);
                    
    }
    public function store(Request $request)
    {
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ];

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal ditambahkan. ' . $validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }
        
        $mhs = MahasiswaModel::create($request->all());
        return response()->json([
            'status' => ($mhs),
            'modal_close' => false,
            'message' => ($mhs) ? 'Data berhasil ditambahkan' : 'Data gagal ditambahkan',
            'data' => null
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $prodi = ProdiModel::all();
        return view('mahasiswa.create_mahasiswa',)
            ->with('url_form', url('/mahasiswa'))
            ->with('prodi', $prodi);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_old(Request $request)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim',
            'nama' => 'required|string|max:50',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
            'id_prodi' => 'required|numeric',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:225',
            'hp' => 'required|digits_between:6, 15',

        ]);
        if ($request->file('foto')) {
            $image_name = $request->file('foto')->store('kaki', 'public');
        }

        MahasiswaModel::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'foto' => $image_name,
            'id_prodi' => $request->id_prodi,
            'jk' => $request->jk,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'hp' => $request->hp,
        ]);
        // Jika data berhasil ditambahkan, akan kembali kehalaman utama
        // return dd(dd($request->all()));
        return redirect('mahasiswa')
            ->with('success', 'Mahasiswa Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // dd($mahasiswa->get());
        $prodi = ProdiModel::where('id_prodi', $id)->get();
        $mahasiswa = MahasiswaModel::find($id);
        return view('mahasiswa.create_mahasiswa')
            ->with('mhs' ,$mahasiswa)
            ->with('prodi', $prodi)
            ->with('url_form', url('/mahasiswa/'. $id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rule = [
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,' . $id,
            'nama' => 'required|string|max:50',
            'hp' => 'required|digits_between:6,15',
        ];

        $validator = Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'modal_close' => false,
                'message' => 'Data gagal diedit. ' . $validator->errors()->first(),
                'data' => $validator->errors()
            ]);
        }

        $mhs = MahasiswaModel::where('id', $id)->update($request->except('_token', '_method'));

        return response()->json([
            'status' => ($mhs),
            'modal_close' => $mhs,
            'message' => ($mhs) ? 'Data berhasil diedit' : 'Data gagal diedit',
            'data' => null
        ]);
    }

    public function update_old(Request $request,$id)
    {
        $request->validate([
            'nim' => 'required|string|max:10|unique:mahasiswa,nim,'.$id,
            'nama' => 'required|string|max:50',
            'foto' => 'required|image|mimes:jpeg,png,jpg',
            'id_prodi' => 'required|numerik',
            'jk' => 'required|in:l,p',
            'tempat_lahir' => 'required|string|max:50',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required|string|max:225',
            'hp' => 'required|digits_between:6, 15',

        ]);
        $images_name = $request->file('foto')->store('images', 'pulic');
        $date = MahasiswaModel::where('id','=', $id)->update($request->except(['_token', '_method']));
        // Jika data berhasil ditambahkan, akan kembali kehalaman utama
        return redirect('mahasiswa')
        ->with('success', 'Mahasiswa Berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $mhs = MahasiswaModel::find($id);

        if (!$mhs) {
            return response()->json([
                'status' => false,
                'message' => 'Data not found',
                'data' => null
            ]);
        }

        $deleted = $mhs->delete();

        if ($deleted) {
            return response()->json([
                'status' => true,
                'message' => 'Data berhasil dihapus',
                'data' => null
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal dihapus',
                'data' => null
            ]);
        }
    }

    public function destroy_old($id)
    {
        MahasiswaMatakuliahModel::where('mahasiswa_id', '=' , $id)->delete();
        MahasiswaModel::where('id', '=', $id)->delete();
        return redirect('mahasiswa')
            ->with('success', 'Mahasiswa berhasil dihapus');
    }

    public function show($id)
    {
        $mahasiswa = MahasiswaModel::find($id);

        if ($mahasiswa) {
            return response()->json($mahasiswa);
        } else {
            return response()->json(['error' => 'Data not found'], 404);
        }
    }

    public function show_old($id)
    {
        $khs = MahasiswaMatakuliahModel::where('mahasiswa_id', $id)->get();
        $mahasiswa = MahasiswaModel::with('prodi')->where('id', $id)->first();
        return view('mahasiswa.detail_mahasiswa', ['mahasiswa' => $mahasiswa]);
    }

    public function nilai($id){
        $data = MahasiswaModel::where('id', $id)->first();
        $khs = MahasiswaMatakuliahModel::where('mahasiswa_id', $id)->get();
        return view('mahasiswa.show_mahasiswa')
            ->with('data' , $data)
            ->with('khs' , $khs);

    }

    public function cetak_pdf($id)
    {
        $data = MahasiswaModel::where('id', $id)->first();
        $khs = MahasiswaMatakuliahModel::where('mahasiswa_id', $id)->get();
        $pdf = PDF::loadview('mahasiswa.cetak_pdf', ['data' => $data, 'khs' => $khs]);
        return $pdf->stream();
    }
}
