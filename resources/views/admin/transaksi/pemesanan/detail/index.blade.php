@extends('layouts/admin')

@section('title') Admin Detail Masuk @endsection

@section('head')
<link href="{{asset('plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection

@section('content')
<<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{route('pemesananIndex')}}">Transaksi</a></li>
                <li class="breadcrumb-item active"><a href="{{route('pemesananIndex')}}">Data Pemesanan</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Data Detail Pemesanan</a></li>
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
                            {{-- <form action="{{Route('pemesananDetailUpdate')}}" method="post">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="uuid" value="{{$pemesanan->uuid}}" id="">
                            <button type="submit" class="btn btn-outline-info"><span><i class="feather icon-exit"></i>
                                    Simpan Detail Pemesanan
                                </span></button>
                            </form> --}}
                            <!-- Modal Tambah-->
                            @if($pemesanan->status == 0)
                            <button class="btn btn-outline-primary" data-toggle="modal"
                                data-target="#modalTambah1"><span><i class="feather icon-plus"></i> Tambah
                                    Data</span></button>
                            @endif
                            <!-- Modal End -->
                        </div>
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

    <div class="modal fade text-left" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
        aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel1" style="padding-left: 10px;">Tambah Barang</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ Route('updateHarga') }}" method="POST" }}>
                        <div class="body">
                            @method('PUT')
                            @csrf
                            @if(Auth::user()->role == 1)
                            <input type="hidden" name="detail_id" id="detail_id">
                            <div class="form-group">
                                <label>Harga</label>
                                <div class="form-group">
                                    <input type="number" name="harga" id="hrg" placeholder="Masukkan harga"
                                        class="form-control  @error ('harga') is-invalid @enderror">
                                    @error('harga')<div class="invalid-feedback"> {{$message}} </div>@enderror
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary text-white"
                                data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Update harga</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('admin.transaksi.pemesanan.detail.create')
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
                        url: "{{ url('/admin/pemesanandetail/delete')}}" + '/' + id,
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
        $('#editModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var harga = button.data('hrg')
        var modal = $(this)

        modal.find('.modal-body #detail_id').val(id)
        modal.find('.modal-body #hrg').val(harga)
    })
    </script>

    @endsection