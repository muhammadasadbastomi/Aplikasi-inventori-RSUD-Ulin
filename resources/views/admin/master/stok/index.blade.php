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
                            <!-- Modal Tambah & Cetak -->
                            <div class="dropdown">
                                <!-- <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambah">
                                    <span><i class="feather icon-plus"></i> Tambah Data</span>
                                </button> -->
                                &emsp14;
                                <button class="btn btn-outline-info dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span><i class="feather icon-printer"></i> Cetak Data</span>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <a class="dropdown-item" target="_blank" href="{{route('cetakStok')}}">Keseluruhan</a>
                                    <a class="dropdown-item" target="_blank" href="{{route('cetakStokhbs')}}">Hampir
                                        Habis</a>
                                    <button class="dropdown-item" target="_blank" data-toggle="modal" data-target="#modalcetaktgl">Berdasarkan Tanggal</button>
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
                                        @if($d->stok < 6) <td scope="col" class="text-center text-red">{{ $d->stok }}
                                            </td>
                                            @else
                                            <td scope="col" class="text-center">{{ $d->stok }}</td>
                                            @endif
                                            <td scope="col" class="text-center">
                                                <a class="btn btn-sm btn-info text-white" data-id="{{$d->id}}" data-stok="{{$d->stok}}" data-toggle="modal" data-target="#editstok">
                                                    <i class="fa fa-pencil color-muted m-r-5"></i>
                                                </a>
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

    @include('admin.master.stok.cetaktgl')
    @include('admin.master.stok.editstok')
    @endsection

    @section('script')
    <script src="{{asset('plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>

    <script>
        $('#editstok').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var stok = button.data('stok')
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #stok').val(stok);
        })
    </script>

    @endsection