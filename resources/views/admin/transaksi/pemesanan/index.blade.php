@extends('layouts/admin')

@section('title') Admin Data Pemesanan Barang @endsection

@section('head')
<link href="{{asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">Transaksi</a></li>
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
                            <!-- Modal Tambah-->
                            <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalTambah"><span><i class="feather icon-plus"></i> Tambah
                                    Data</span></button>
                            <!-- Modal End -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama Unit</th>
                                        <th scope="col" class="text-center">Nama User</th>
                                        <th scope="col" class="text-center">Tanggal Pesanan</th>
                                        <th scope="col" class="text-center">Alamat</th>
                                        <th scope="col" class="text-center">Jumlah</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                    <tr>
                                        <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                        <td scope="col" class="text-center">{{ $d->unit_id }}</td>
                                        <td scope="col" class="text-center">{{ $d->user_id }}</td>
                                        <td scope="col" class="text-center">{{ $d->tgl_pesan }}</td>
                                        <td scope="col" class="text-center">{{ $d->alamat }}</td>
                                        <td scope="col" class="text-center">{{ $d->jumlah }}</td>
                                        <td scope="col" class="text-center">
                                            <a class="btn btn-sm btn-info text-white" data-id="{{$d->id}}" data-toggle="modal" data-target="#editModal">
                                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                            </a>
                                            <a class="btn btn-sm btn-danger text-white" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-close color-danger"></i></a>
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

    @include('admin.transaksi.pemesanan.create')
    @include('admin.transaksi.pemesanan.edit')
    @endsection

    @section('script')
    <script src="{{asset('plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>

    <script>
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
        })
    </script>

    @endsection