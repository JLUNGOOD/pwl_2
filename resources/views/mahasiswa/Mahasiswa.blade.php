<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Blank Page @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset ('assets/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset ('assets/dist/css/adminlte.min.css') }}">

  @stack('custom.css')
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('layouts.navbar')
  <!-- /.navbar -->
  @include('layouts.sidebar')
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    @yield('contact')
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Dasboard</h3> --}}

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <a href="{{ url('mahasiswa/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a>
          {{-- @yield('content') --}}
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                
                <th>No</th>
                <th>Nim</th>
                <th>Nama</th>
                <th>JK</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Alamat</th>
                <th>Hp</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @if($mhs->count()>0)
                @foreach ($mhs as $i => $m)
                    <tr>
                      <td>{{$i + 1}}</td>
                      <td>{{$m->nim}}</td>
                      <td>{{$m->nama}}</td>
                      <td>{{$m->jk}}</td>
                      <td>{{$m->tempat_lahir}}</td>
                      <td>{{$m->tanggal_lahir}}</td>
                      <td>{{$m->alamat}}</td>
                      <td>{{$m->hp}}</td>
                      <td>
                        {{-- Tombol edit dan delete --}}
                        <a href="{{url('/mahasiswa/'.$m->id. '/edit')}}" class="btn btn-sm btn-warning my-2">edit</a>
                        <form method="POST" action="{{url('/mahasiswa/'.$m->id)}}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                      </td>
                    </tr>
                @endforeach
              @else
              <tr><td colspan="9" class="text-center">Data Tidak ada</td></tr>
              @endif
            </tbody>
          </table>
        </div>
        <!-- /.card-body -->
        
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset ('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset ('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset ('assets/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset ('assets/dist/js/demo.js') }}"></script>
</body>
</html>
