@extends('layouts/admin')

@section('title') Admin Data Barang Keluar @endsection

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
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Barang Keluar</a></li>
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
                                    <a class="dropdown-item" target="_blank" href="{{route('cetakKeluar')}}" style="margin-left: -5px;">Keseluruhan</a>
                                    <button class="btn nohover dropdown-item" data-toggle="modal" data-target="#tglModal">Berdasarkan Tanggal</button>
                                </div>
                            </div>
                            <!-- Modal End -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama Unit</th>
                                        <th scope="col" class="text-center">Nama User</th>
                                        <th scope="col" class="text-center">Tanggal Keluar</th>
                                        <th scope="col" class="text-center">Jumlah</th>
                                        <th scope="col" class="text-center">Total</th>
                                        <th scope="col" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $d)
                                    <tr>
                                        <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                        <td scope="col" class="text-center">{{ $d->unit->nama_unit }}</td>
                                        <td scope="col" class="text-center">{{ $d->user->name }}</td>
                                        <td scope="col" class="text-center">
                                            {{carbon\carbon::parse($d->tgl_pesan)->translatedFormat('d F Y')}}</td>
                                        @if($d->total > 0)
                                        <td scope="col" class="text-center">{{ $d->total }}</td>
                                        @else
                                        <td scope="col" class="text-center"> - </td>
                                        @endif
                                        <td scope="col" class="text-center">@currency($d->totalharga)</td>
                                        <td scope="col" class="text-center">
                                            {{-- <a class="btn btn-sm btn-primary text-white"
                                                href="{{route('cetakInvoicePemesanan', ['uuid' => $d->id])}}">
                                            <i class="fa icon-print color-muted m-r-5">Kirim Email</i>
                                            </a> --}}
                                            @if(Auth::user()->role && $d->status == 0)
                                            <a class="btn btn-sm btn-primary text-white" href="{{route('cetakInvoicePemesanan', ['uuid' => $d->id])}}">
                                                <i class="fa icon-check color-muted m-r-5"></i>
                                            </a>
                                            <a class="btn btn-sm btn-success text-white" href="{{route('keluardetailIndex', ['id' => $d->uuid])}}">
                                                <i class="fa icon-plus color-muted m-r-5"></i>
                                            </a>
                                            <a class="btn btn-sm btn-info text-white" data-id="{{$d->id}}" data-unit_id="{{$d->unit->id}}" data-user_id="{{$d->user->id}}" data-tgl_pesan="{{$d->tgl_pesan}}" data-alamat="{{$d->alamat}}" data-toggle="modal" data-target="#editModal">
                                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                            </a>
                                            <a class="delete btn btn-sm btn-danger text-white" data-id="{{$d->uuid}}" href="#" data-toggle="tooltip" data-placement="top"><i class="fa fa-close color-danger"></i></a>
                                            @else
                                            <a class="btn btn-sm btn-success text-white" href="{{route('keluardetailIndex', ['id' => $d->uuid])}}">
                                                <i class="fa icon-plus color-muted m-r-5"></i>
                                            </a>
                                            @endif
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

    @include('admin.transaksi.keluar.create')
    @include('admin.transaksi.keluar.edit')
    @include('admin.transaksi.keluar.cetaktgl')
    @endsection

    @section('script')
    <script src="{{asset('plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>

    <script>
        $('#editModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var id = button.data('id')
            var user_id = button.data('user_id')
            var unit_id = button.data('unit_id')
            var tgl_keluar = button.data('tgl_keluar')
            var modal = $(this)

            modal.find('.modal-body #id').val(id)
            modal.find('.modal-body #user_id').val(user_id)
            modal.find('.modal-body #unit_id').val(unit_id)
            modal.find('.modal-body #tgl_keluar').val(tgl_keluar)
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
                        url: "{{ url('/admin/keluar/delete')}}" + '/' + id,
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
