<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
<style>
    .text-center {
        text-align: center;
    }

    .d-flex {
        display: flex;
    }

    .justify-content-center {
        justify-content: center;
    }

    .list-group-item {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .font-weight-bold {
        font-weight: bold;
    }

    /* .btn {
        display: inline-block;
        padding: 0.5rem 1rem;
        font-size: 1rem;
        font-weight: bold;
        text-align: center;
        text-decoration: none;
        background-color: #007bff;
        color: #fff;
        border-radius: 0.25rem;
    }

    .btn-primary {
        background-color: #007bff;
    } */

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 1rem;
    }

    .table th,
    .table td {
        padding: 0.5rem;
        border: 1px solid #dee2e6;
    }

    .table th {
        font-weight: bold;
        background-color: #f8f9fa;
    }

    .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
    }

    .table-striped tbody tr:nth-of-type(even) {
        background-color: #fff;
    }

    .text-muted {
        color: #6c757d;
    }

    .text-center {
        text-align: center;
    }

    .img {
        /* max-width: 240px; */
        display: block;
        margin-left: auto;
        margin-right: auto;
        /* float: right;
        margin: 5px; */
    }

    .text-center ul {
        margin-top: 1rem;
    }

    .text-center ul li {
        list-style: none;
    }
</style>
</head>
<body>
    <h4 class="text-center">JURUSAN TEKNOLOGI INFORMASI - POLITEKNIK NEGERI MALANG</h4>
    <h3 class="text-center">KARTU HASIL STUDI (KHS)</h3>
    <div class="d-flex justify-content-center">
        <img src="{{ asset('storage/' . $data->foto) }}" width="240">
    </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Nim : </b>{{ $data->nim }}</li>
                <li class="list-group-item"><b>Nama : </b>{{ $data->nama }}</li>
                <li class="list-group-item"><b>Peodi : </b>{{ $data->prodi->prodi }}</li>
                <li class="list-group-item"><b>Jenis Kelamin : </b>{{ $data->jk }}</li>
                <li class="list-group-item"><b>Tempat Lahir : </b>{{ $data->tempat_lahir }}</li>
                <li class="list-group-item"><b>Tanggal Lahir : </b>{{ $data->tanggal_lahir }}</li>
                <li class="list-group-item"><b>Alamat : </b>{{ $data->alamat }}</li>
                <li class="list-group-item"><b>No. Hp : </b>{{ $data->hp }}</li>
            </ul>
            {{-- <a href="{{ url('/mahasiswa/cetak_pdf/' . $data->id) }}" class="btn btn-primary">Cetak KRS</a> --}}
    

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
</body>
</html>