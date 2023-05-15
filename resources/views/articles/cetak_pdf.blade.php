<!DOCTYPE html>
<html lang="en">
<head>
    <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
</head>
<body>
<style>
    table tr td,
    table tr th {
        font-size: 9pt;
    }

    img {
        width: 300px;
        height: auto;
    }
</style>
<div style="text-align: center;">
    <h4>Laporan Artikel</h4>
</div>
<table class='table table-bordered'>
    <thead>
    <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Isi</th>
        <th>Gambar</th>
    </tr>
    </thead>
    <tbody>
    @foreach($articles as $a)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{$a->title}}</td>
            <td>{{$a->content}}</td>
            <td>
                <img src="{{ asset('/storage') }}/{{$a->featured_image}}" alt="Featured Image">
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
</body>

