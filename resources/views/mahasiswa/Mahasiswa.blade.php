 @extends('layouts.template')

 @section('content')
    
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-body">
          {{-- <a href="{{ url('mahasiswa/create')}}" class="btn btn-sm btn-success my-2">Tambah Data</a> --}}
          <button class="btn btn-sm btn-success my-2" data-toggle="modal" data-target="#modal_mahasiswa">Tambah Data</button>
          
          <table class="table table-bordered table-striped" id="data_mahasiswa">
            <thead>
                <tr>
                    
                    <th>No</th>
                    <th>Nim</th>
                    <th>Nama</th>
                    {{-- <th>Foto</th>
                    <th>Prodi</th>
                    <th>JK</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Alamat</th> --}}
                    <th>Hp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <?php
              
              
              // {{-- @if($mhs->count()>0)
              //   @foreach ($mhs as $i => $m)
              //       <tr>
              //         <td>{{$i + 1}}</td>
              //         <td>{{$m->nim}}</td>
              //         <td>{{$m->nama}}</td>
              //         <td>
              //             <img src="{{ asset('storage/' . $m->foto) }}" alt="{{ $m->foto }}" width="50">
              //         </td>
              //         <td>{{$m->prodi->prodi}}</td>
              //         <td>{{$m->jk}}</td>
              //         <td>{{$m->tempat_lahir}}</td>
              //         <td>{{$m->tanggal_lahir}}</td>
              //         <td>{{$m->alamat}}</td>
              //         <td>{{$m->hp}}</td>
              //         <td>  --}}
              //           {{-- Tombol edit dan delete --}}
              //           {{-- <a href="{{url('/mahasiswa/'.$m->id)}}" class="btn btn-sm btn-primary my-2">show</a>

              //           <a href="{{url('/mahasiswa/'.$m->id. '/nilai')}}" class="btn btn-sm btn-success my-2">nilai</a>

              //           <a href="{{url('/mahasiswa/'.$m->id. '/edit')}}" class="btn btn-sm btn-warning my-2">edit</a>

              //           <form method="POST" action="{{url('/mahasiswa/'.$m->id)}}">
              //               @csrf
              //               @method('DELETE')
              //               <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
              //           </form>
              //         </td>
              //       </tr>
              //   @endforeach
              // @else
              // <tr><td colspan="9" class="text-center">Data Tidak ada</td></tr>
              // @endif --}}
             ?> 
            </tbody>
          </table>
        </div>
        

    </section>
    <div class="modal fade" id="modal_mahasiswa" style="display: none;" aria-hidden="true">
        <form method="post" action="{{ url('mahasiswa') }}" role="form" class="form-horizontal" id="form_mahasiswa">
            @csrf
            <div class="modal-dialog modal-">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Default Modal</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row form-message"></div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label">NIM</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="nim" name="nim" value="" />
                            </div>
                        </div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="" />
                            </div>
                        </div>
                        <div class="form-group required row mb-2">
                            <label class="col-sm-2 control-label col-form-label">No. HP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control form-control-sm" id="hp" name="hp" value="" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="modal fade" id="modal_show_mahasiswa" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Detail Mahasiswa</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="show_nim" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="show_nama" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 control-label">No. HP</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="show_hp" readonly>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
 @endsection

@push('js_tambahan')
<script>
    function tambahData() {
        $('#modal_mahasiswa').modal('show');
        $('#modal_mahasiswa .modal-title').html('Tambah Data Mahasiswa');
        $('#modal_mahasiswa #nim').val('');
        $('#modal_mahasiswa #nama').val('');
        $('#modal_mahasiswa #hp').val('');
    }

    function updateData(th){
        $('#modal_mahasiswa').modal('show');
        $('#modal_mahasiswa .modal-title').html('Edit Data Mahasiswa');
        $('#modal_mahasiswa #nim').val($(th).data('nim'));
        $('#modal_mahasiswa #nama').val($(th).data('nama'));
        $('#modal_mahasiswa #hp').val($(th).data('hp'));
        $('#modal_mahasiswa #form_mahasiswa').attr('action', $(th).data('url'));
        $('#modal_mahasiswa #form_mahasiswa').append('<input type="hidden" name="_method" value="PUT">');
    }

    function showData(element) {
        $.ajax({
            url: '{{  url('mahasiswa') }}'+ '/' + element,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
            
            $('#modal_show_mahasiswa').modal('show');
            
            $('#show_nim').val(data.nim);
            $('#show_nama').val(data.nama);
            $('#show_hp').val(data.hp);
            },
            error: function() {
            alert('Error occurred while retrieving data.');
            }
        });
    }

    function deleteData(element) {
        if (!confirm("Anda Yakin Ingin Menghapus Data Ini?")) {
            return false;
        }
        // console.log("Melakukan anu");
        $.ajax({
            url: '{{  url('mahasiswa/delete') }}'+ '/' + element,
            method: 'POST',
            dataType: 'json',
            data: {
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
                alert(data.message);
                location.reload();
            },
            error: function() {
                alert('Error occurred while deleting data.');
            }
        });
    }

    $(document).ready(function (){
        var dataMahasiswa = $('#data_mahasiswa').DataTable({
            processing:true,
            serverSide:true,
            ajax:{
                'url': '{{  url('mahasiswa/data') }}',
                'dataType': 'json',
                'type': 'POST',
            },
            columns:[
                {data:'nomor', name:'nomor', searchable:false, sortable:false},
                {data:'nim',name:'nim', sortable: false, searchable: true},
                {data:'nama',name:'nama', sortable: false, searchable: true},
                {data:'hp',name:'hp', sortable: false, searchable: true},
                {data:'id',name:'id', sortable: false, searchable: false,
                    render: function(data, type, row, meta){
                        var btn = `<button data-url="{{ url('/mahasiswa')}}/`+data+`" class="btn btn-xs btn-warning mr-2 ml-2" onclick="updateData(this)" data-id="`+row.id+`" data-nim="`+row.nim+`" data-nama="`+row.nama+`" data-hp="`+row.hp+`"><i class="fa fa-edit"></i>Edit</button>` +
                                  `<button href="{{ url('/mahasiswa/') }}/`+data+` " onclick="showData(`+data+`)" class="btn btn-xs btn-info mr-2 ml-2"><i class="fa fa-list"></i>Detail</button>` +
                                  `<button class="btn btn-xs btn-danger" onclick="deleteData(`+data+`)"><i class="fa fa-trash mr-2 ml-2"></i>Hapus</button>`;
                        return btn;
                    }
                },

            ]
        });

        $('#form_mahasiswa').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: $(this).attr('action'),
                method: "POST",
                data: $(this).serialize(),
                dataType: 'json',
                success:function(data){
                    $('.form-message').html('');
                    if(data.status){
                        $('.form-message').html('<span class="alert alert-success" style="width: 100%">' + data.message + '</span>');
                        $('#form_mahasiswa')[0].reset();
                        dataMahasiswa.ajax.reload();
                        $('#form_mahasiswa').attr('action', '{{ url('mahasiswa') }}');
                        $('#form_mahasiswa').find('input[name="_method"]').remove();
                    }else{
                        $('.form-message').html('<span class="alert alert-danger" style="width: 100%">' + data.message + '</span>');
                        alert('error');
                    }

                    if(data.modal_close){
                        $('.form-message').html('');
                        $('#modal_mahasiswa').modal('hide');
                    }

                }
            });
        });
    });
</script>
@endpush


