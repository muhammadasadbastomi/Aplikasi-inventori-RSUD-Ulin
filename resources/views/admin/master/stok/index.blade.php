@extends('layouts/admin')

@section('title') Admin Data Stok Barang @endsection

@section('head')
<link href="{{asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Stok Barang</a></li>
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
                            <!-- Modal Tambah-->
                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambah"><span><i class="feather icon-plus"></i> Tambah Data</span></button>
                            <!-- Modal End -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama Barang</th>
                                        <th scope="col" class="text-center">Merk</th>
                                        <th scope="col" class="text-center">Stok</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                    <tr>
                                        <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                        <td scope="col" class="text-center">{{ $d->nama_barang }}</td>
                                        <td scope="col" class="text-center">{{ $d->merk->nama_merk }}</td>
                                        <td scope="col" class="text-center">{{ $d->stok }}</td>
                                        <td scope="col" class="text-center">
                                            <a class="btn btn-sm btn-info text-white" data-id="{{$d->id}}" data-nama_barang="{{$d->nama_barang}}" data-merk_id="{{$d->merk->id}}" data-satuan_id="{{$d->satuan->id}}" data-stok="{{$d->stok}}" data-toggle="modal" data-target="#editModal">
                                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                            </a>
                                            <a class="btn btn-sm btn-danger text-white" href="#"><i class="fa fa-close color-danger"></i></a>
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
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var nama_barang = button.data('nama_barang')
            var merk_id = button.data('merk_id')
            var satuan_id = button.data('satuan_id')
            var stok = button.data('stok')
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #nama_barang').val(nama_barang);
            modal.find('.modal-body #merk_id').val(merk_id);
            modal.find('.modal-body #satuan_id').val(satuan_id);
            modal.find('.modal-body #stok').val(stok);
        })
    </script>

    @endsection