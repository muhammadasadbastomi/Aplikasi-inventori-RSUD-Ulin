@extends('layouts/admin')

@section('title') Admin Data Supplier @endsection

@section('head')
<link href="{{asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Supplier</a></li>
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
                            @include('admin.master.supplier.create')
                            <!-- Modal End -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama Supplier</th>
                                        <th scope="col" class="text-center">Alamat</th>
                                        <th scope="col" class="text-center">Telepon</th>
                                        <th scope="col" class="text-center">Keterangan</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($supplier as $s)
                                    <tr>
                                        <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                        <td scope="col" class="text-center">{{ $s->nama_suppliers }}</td>
                                        <td scope="col" class="text-center">{{ $s->alamat }}</td>
                                        <td scope="col" class="text-center">{{ $s->telepon }}</td>
                                        <td scope="col" class="text-center">{{ $s->keterangan }}</td>
                                        <td scope="col" class="text-center">
                                            <a class="btn btn-sm btn-info text-white" data-id="{{$s->id}}"
                                                data-nama_suppliers="{{$s->nama_suppliers}}"
                                                data-alamat="{{$s->alamat}}" data-telepon="{{$s->telepon}}"
                                                data-keterangan="{{$s->keterangan}}" data-toggle="modal"
                                                data-target="#editModal">
                                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                            </a>
                                            <a class="delete btn btn-sm btn-danger text-white" data-id="{{$s->uuid}}"
                                                href="#" data-toggle="tooltip" data-placement="top" title=""
                                                data-original-title="Hapus"><i class="fa fa-close color-danger"></i></a>
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

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
        aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="edit-modal-label" style="padding-left: 10px;">Edit Supplier</h4>
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
                                <label class="col-form-label" for="nama_suppliers">Nama Supplier</label>
                                <input type="text" class="form-control @error ('nama_suppliers') is-invalid @enderror"
                                    placeholder="Masukkan Supplier" name="nama_suppliers"
                                    value="{{old('nama_suppliers')}}" id="nama_suppliers" autofocus>
                                @error('nama_suppliers')<div class="invalid-feedback"> {{$message}} </div>@enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="alamat">Alamat</label>
                                <textarea type="text" class="form-control @error ('alamat') is-invalid @enderror"
                                    placeholder="Masukkan Alamat" name="alamat" id="alamat"
                                    autofocus>{{old('alamat')}}</textarea>
                                @error('alamat')<div class="invalid-feedback"> {{$message}} </div>@enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="telepon">Telepon</label>
                                <input type="number" class="form-control @error ('telepon') is-invalid @enderror"
                                    placeholder="Masukkan Satuan" name="telepon" value="{{old('telepon')}}" id="telepon"
                                    autofocus>
                                @error('telepon')<div class="invalid-feedback"> {{$message}} </div>@enderror
                            </div>
                            <div class="form-group">
                                <label class="col-form-label" for="keterangan">Keterangan</label>
                                <textarea type="text" class="form-control @error ('keterangan') is-invalid @enderror"
                                    placeholder="Masukkan Satuan" name="keterangan" id="keterangan"
                                    autofocus>{{old('keterangan')}}</textarea>
                                @error('keterangan')<div class="invalid-feedback"> {{$message}} </div>@enderror
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
            var nama_suppliers = button.data('nama_suppliers')
            var alamat = button.data('alamat')
            var telepon = button.data('telepon')
            var keterangan = button.data('keterangan')
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #nama_suppliers').val(nama_suppliers);
            modal.find('.modal-body #alamat').val(alamat);
            modal.find('.modal-body #telepon').val(telepon);
            modal.find('.modal-body #keterangan').val(keterangan);
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
                        url: "{{ url('/admin/supplier/delete')}}" + '/' + id,
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
