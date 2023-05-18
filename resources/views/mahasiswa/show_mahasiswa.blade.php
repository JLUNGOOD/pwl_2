@extends('layouts.template')

@section('content')
    <h4 class="text-center">JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h4>
    <h3 class="text-center">KARTU HASIL STUDI (KHS)</h3>
    <div class="d-flex justify-content-center">
        <img src="{{ asset('storage/' . $data->foto) }}" width="240">
    </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Nim : </b>{{ $data->nim }}</li>
                <li class="list-group-item"><b>Nama : </b>{{ $data->nama }}</li>
                <li class="list-group-item"><b>Kelas : </b>{{ $data->prodi->prodi }}</li>
                <li class="list-group-item"><b>Jenis Kelamin : </b>{{ $data->jk }}</li>
                <li class="list-group-item"><b>Tempat Lahir : </b>{{ $data->tempat_lahir }}</li>
                <li class="list-group-item"><b>Tanggal Lahir : </b>{{ $data->tanggal_lahir }}</li>
                <li class="list-group-item"><b>Alamat : </b>{{ $data->alamat }}</li>
                <li class="list-group-item"><b>No. Hp : </b>{{ $data->hp }}</li>
            </ul>
            <a href="{{ url('/mahasiswa/cetak_pdf/' . $data->id) }}" class="btn btn-primary">Cetak KRS</a>
    

    {{-- <p><span class="font-weight-bold">Nama:</span> {{$data->nama}}</p>
    <p><span class="font-weight-bold">NIM:</span> {{$data->nim}}</p>
    <p><span class="font-weight-bold">Prodi:</span> {{$data->prodi->prodi}}</p> --}}

    <table class="table table-striped">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Matakuliah</th>
            <th>Nama MataKuliah</th>
            <th>Jumlah SKS</th>
            <th>Nilai</th>
        </tr>
        </thead>
        <tbody>
        @if($khs->count() > 0)
            @foreach($khs as $i => $row)
                <tr>
                  <td>{{++$i}}</td>
                    <td>{{ $row->matkul->kode_matkul }}</td>
                    <td>{{ $row->matkul->nama_matkul }}</td>
                    <td>{{ $row->matkul->jumlah_sks }}</td>
                    <td>{{ $row->nilai}}</td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="8" class="text-center">Data tidak ada</td>
            </tr>
        @endif

        </tbody>
    </table>
@endsection