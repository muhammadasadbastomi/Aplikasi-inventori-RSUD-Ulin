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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Data User</a></li>
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
                            <!-- Modal End -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama</th>
                                        <th scope="col" class="text-center">Email</th>
                                        <th scope="col" class="text-center">Telepon</th>
                                        <th scope="col" class="text-center">Role</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                    <tr>
                                        <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                        <td scope="col" class="text-center">{{ $d->name }}</td>
                                        <td scope="col" class="text-center">{{ $d->email }}</td>
                                        <td scope="col" class="text-center">{{ $d->telp }}</td>
                                        <td scope="col" class="text-center">{{ $d->role }}</td>
                                        <td scope="col" class="text-center">
                                            <a class="btn btn-sm btn-info text-white" data-id="{{$d->id}}"
                                                data-toggle="modal" data-target="#editModal">
                                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                            </a>
                                            <a class="delete btn btn-sm btn-danger text-white" data-id="{{$d->uuid}}"
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

    @include('admin.user.create')
    {{-- @include('admin.master.barang.edit') --}}
    @endsection

    @section('script')
    <script src="{{asset('plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}">
    </script>
    <script src="{{asset('plugins/tables/js/datatable-init/datatable-basic.min.js')}}">
    </script>

    <script>
        $('#editModal').on('show.bs.modal', function(event) {
            let button = $(event.relatedTarget)
            let id = button.data('id')

            let modal = $(this)

            modal.find('.modal-body #id').val(id)

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
                    url: "{{ url('/admin/show/delete')}}" + '/' + id,
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
