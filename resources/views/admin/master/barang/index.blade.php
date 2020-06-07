@extends('layouts/admin')

@section('title') Admin Data Barang @endsection

@section('head')
<link href="{{asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Master</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Barang</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="float-right" style="margin-right: 30px;">
                            <!-- Modal Tambah & Cetak -->
                            <div class="dropdown">
                                <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambah">
                                    <span><i class="feather icon-plus"></i> Tambah Data</span>
                                </button>
                                &emsp14;
                                <button class="btn btn-outline-info dropdown-toggle" role="button" id="dropdownMenuLink"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span><i class="feather icon-printer"></i> Cetak Data</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" target="_blank"
                                        href="{{route('cetakBarang')}}">Keseluruhan</a>
                                    <!-- <a class="dropdown-item" href="#">Another action</a> -->
                                </div>
                            </div>
                            <!-- Modal End -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama Barang</th>
                                        <th scope="col" class="text-center">Merk</th>
                                        <th scope="col" class="text-center">Satuan</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($barang as $b)
                                    <tr>
                                        <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                        <td scope="col" class="text-center">{{ $b->nama_barang }}</td>
                                        <td scope="col" class="text-center">{{ $b->merk->nama_merk }}</td>
                                        <td scope="col" class="text-center">{{ $b->satuan->nama_satuan }}</td>
                                        <td scope="col" class="text-center">
                                            <a class="btn btn-sm btn-info text-white" data-id="{{$b->id}}"
                                                data-nama_barang="{{$b->nama_barang}}" data-merk_id="{{$b->merk->id}}"
                                                data-satuan_id="{{$b->satuan->id}}" data-stok="{{$b->stok}}"
                                                data-toggle="modal" data-target="#editModal">
                                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                            </a>
                                            <a class="delete btn btn-sm btn-danger text-white" data-id="{{$b->uuid}}"
                                                href="#"><i class="fa fa-close color-danger"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #/ container -->
</div>

@include('admin.master.barang.create')
@include('admin.master.barang.edit')
@endsection

@section('script')
<script src="{{asset('plugins/tables/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>

<script>
    $('#editModal').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget)
            let id = button.data('id')
            let nama_barang = button.data('nama_barang')
            let merk_id = button.data('merk_id')
            let satuan_id = button.data('satuan_id')
            let stok = button.data('stok')
            let modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #nama_barang').val(nama_barang);
            modal.find('.modal-body #merk_id').val(merk_id);
            modal.find('.modal-body #satuan_id').val(satuan_id);
            modal.find('.modal-body #stok').val(stok);
        })
</script>

<script>
    $('#editstok').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget)
            let id = button.data('id')
            let stok = button.data('stok')
            let modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #stok').val(stok);
        })
</script>

<script>
    $(document).on('click', '.delete', function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            swal.fire({
                title: "Apakah anda yakin?",
                icon: "warning",
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                showCancelButton: true,
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url: "{{ url('/admin/barang/delete')}}" + '/' + id,
                        type: "POST",
                        data: {
                            '_method': 'DELETE',
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Data Berhasil Dihapus',
                                showConfirmButton: false,
                                timer: 1500
                            })
                            setTimeout(function() {
                                document.location.reload(true);
                            }, 1000);
                        },
                    })
                } else if (result.dismiss === swal.DismissReason.cancel) {
                    Swal.fire(
                        'Dibatalkan',
                        'data batal dihapus',
                        'error'
                    )
                }
            })
        });
</script>

@endsection
