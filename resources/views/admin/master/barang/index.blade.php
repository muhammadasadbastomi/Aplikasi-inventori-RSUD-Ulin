@extends('layouts/admin')

@section('title') Admin Data Barang @endsection

@section('head')
<link href="{{asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
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
                            <button class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#modalTambah"><span><i class="feather icon-plus"></i> Tambah
                                    Data</span></button>
                            @include('admin.master.barang.create')
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
                                                data-nama_barang="{{$b->nama_barang}}" data-merk_id="{{$b->merk_id}}"
                                                data-satuan_id="{{$b->satuan_id}}" data-toggle="modal"
                                                data-target="#editModal">
                                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                            </a>
                                            <a href="#" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Close"><i class="fa fa-close color-danger"></i></a>
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

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="edit-modal-label" style="padding-left: 10px;">Edit Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post">
                        {{ method_field('put') }}
                        @csrf
                        <div class=" modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label class="col-form-label" for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control @error ('nama_barang') is-invalid @enderror"
                                    placeholder="Masukkan Nama Barang" name="nama_barang" value="{{old('nama_barang')}}"
                                    id="nama_barang" autofocus>
                                @error('nama_barang')<div class="invalid-feedback"> {{$message}} </div>@enderror
                            </div>

                            <div class="form-group">
                                <label for="merk_id">Merk</label>
                                <select class="custom-select" name="merk_id" id="merk_id">
                                    @foreach($merk as $m)
                                    <option value="{{$m->id}}" {{ $barang->merk_id == $m->id ? 'selected' : ''}}
                                        selected>
                                        {{$m->merk}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="satuan_id">Satuan</label>
                                <select class="custom-select" name="satuan_id" id="satuan_id">
                                    @foreach($satuan as $s)
                                    <option value="{{$s->id}}" {{ $barang->satuan_id == $s->id ? 'selected' : ''}}
                                        selected>
                                        {{$s->satuan}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="edit modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="edit btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #nama_barang').val(nama_barang);
            modal.find('.modal-body #merk_id').val(merk_id);
            modal.find('.modal-body #satuan_id').val(satuan_id);
        })
    </script>

    @endsection
