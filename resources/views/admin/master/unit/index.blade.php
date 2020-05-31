@extends('layouts/admin')

@section('title') Admin Data Unit @endsection

@section('head')
<link href="{{asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Unit</a></li>
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
                            @include('admin.master.unit.create')
                            <!-- Modal End -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama Unit</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unit as $u)
                                    <tr>
                                        <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                        <td scope="col" class="text-center">{{ $u->nama_unit }}</td>
                                        <td scope="col" class="text-center">
                                            <a class="btn btn-sm btn-info text-white" data-id="{{$u->id}}"
                                                data-nama_unit="{{$u->nama_unit}}" data-toggle="modal"
                                                data-target="#editModal">
                                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                            </a>
                                            <a class="delete btn btn-sm btn-danger text-white" data-id="{{$u->uuid}}"
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
                    <h4 class="modal-title" id="edit-modal-label" style="padding-left: 10px;">Edit Unit</h4>
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
                                <label class="col-form-label" for="nama_unit">Nama Unit</label>
                                <input type="text" class="form-control @error ('nama_unit') is-invalid @enderror"
                                    placeholder="Masukkan Nama Unit" name="nama_unit" value="{{old('nama_unit')}}"
                                    id="nama_unit" autofocus>
                                @error('nama_unit')<div class="invalid-feedback"> {{$message}} </div>@enderror
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
            var nama_unit = button.data('nama_unit')
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #nama_unit').val(nama_unit);
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
                        url: "{{ url('/admin/unit/delete')}}" + '/' + id,
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
