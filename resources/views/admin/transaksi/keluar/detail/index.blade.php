@extends('layouts/admin')

@section('title') Admin Detail Barang Keluar @endsection

@section('head')
<link href="{{asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('keluarIndex')}}">Transaksi</a></li>
                <li class="breadcrumb-item active"><a href="{{route('keluarIndex')}}">Data Barang Keluar</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Detail Barang Keluar</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        {{-- <div class="float-right" style="margin-right: 30px;">
                            <!-- Modal Tambah-->
                            <button class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#modalTambah1"><span><i class="feather icon-plus"></i> Tambah
                                    Data</span></button>
                            <!-- Modal End -->
                        </div> --}}
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration nowrap">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center">No</th>
                                        <th scope="col" class="text-center">Nama Barang</th>
                                        @if(Auth::user()->role == 1)
                                        <th scope="col" class="text-center">Harga Jual</th>
                                        @endif
                                        <th scope="col" class="text-center">Jumlah</th>
                                        @if($pemesanan->status == 0)
                                        <th scope="col" class="text-center">Aksi</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pemesanandetail as $p)
                                    <tr>
                                        <td scope="col" class="text-center">{{ $loop->iteration }}</td>
                                        <td scope="col" class="text-center">{{ $p->barang->nama_barang }}</td>
                                        @if(Auth::user()->role == 1 && $p->harga == null)
                                        <td scope="col" class="text-center">Silahkan update harga</td>
                                        @elseif(Auth::user()->role == 1 && $p->harga != null)
                                        <td scope="col" class="text-center">@currency($p->harga)</td>
                                        @else
                                        @endif
                                        <td scope="col" class="text-center">{{ $p->jumlah }}</td>
                                        @if($pemesanan->status == 0)
                                        <td scope="col" class="text-center">
                                            @if(Auth::user()->role == 1)
                                            <a class="btn btn-sm btn-info text-white" data-id="{{$p->id}}"
                                                data-hrg="{{$p->harga}}" data-toggle="modal" data-target="#editModal">
                                                <i class="fa fa-pencil color-muted m-r-5"></i>
                                            </a>
                                            @endif
                                            <a class="delete btn btn-sm btn-danger text-white" data-id="{{$p->uuid}}"
                                                href="#" data-toggle="tooltip" data-placement="top"><i
                                                    class="fa fa-close color-danger"></i></a>
                                        </td>
                                        @endif
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

    @include('admin.transaksi.keluar.detail.create')
    @endsection

    @section('script')
    <script src="{{asset('plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>


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
                        url: "{{ url('/admin/keluardetail/delete')}}" + '/' + id,
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

    <script>
        $("#input1,#input2").keyup(function() {
            var val1 = $('#input1').val();
            var val2 = $('#input2').val();
            var kali = Number(val1) * Number(val2);
            if (val1 != "" && val2 != "") {
                $('#input3').val(kali);
            }
        })
    </script>

    @endsection
