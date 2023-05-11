@extends('layouts.template')

@section('content')
    <h4 class="text-center">JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h4>
    <h3 class="text-center">KARTU HASIL STUDI (KHS)</h3>

    <p><span class="font-weight-bold">Nama:</span> {{$data->nama}}</p>
    <p><span class="font-weight-bold">NIM:</span> {{$data->nim}}</p>
    <p><span class="font-weight-bold">Prodi:</span> {{$data->prodi->prodi}}</p>

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