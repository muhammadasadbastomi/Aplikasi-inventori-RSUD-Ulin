@extends('layouts/admin')

@section('title') Admin Dashboard @endsection

@section('content')
<div class="content-body">
    <div class="container-fluid mt-3">
        <div class="row">
            @if(Auth::user()->role == 1)
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-1">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Barang</h3>
                        <div class="d-inline-block">
                            @if(empty(totalBarang())) <h4 class="text-white">Tidak Ada Data</h4> @else <h2
                                class="text-white">{{totalBarang()}}</h2> @endif
                            <a class="text-white mb-0" href="{{route('barangIndex')}}"> <i class="icon-info"> Lihat Data
                                </i></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="icon-chart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-2">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Unit</h3>
                        <div class="d-inline-block">
                            @if(empty(totalUnit())) <h4 class="text-white">Tidak Ada Data</h4> @else <h2
                                class="text-white">{{totalUnit()}}</h2> @endif
                            <a class="text-white mb-0" href="{{route('unitIndex')}}"><i class="icon-info"> Lihat Data
                                </i></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="icon-chart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Supplier</h3>
                        <div class="d-inline-block">
                            @if(empty(totalSupplier())) <h4 class="text-white">Tidak Ada Data</h4> @else <h2
                                class="text-white">{{totalSupplier()}}</h2> @endif
                            <a class="text-white mb-0" href="{{route('supplierIndex')}}"><i class="icon-info"> Lihat
                                    Data </i></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="icon-chart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Pemesanan</h3>
                        <div class="d-inline-block">
                            @if(empty(totalPemesanan())) <h4 class="text-white">Tidak Ada Data</h4> @else <h2
                                class="text-white">{{totalPemesanan()}}</h2> @endif
                            <a class="text-white mb-0" href="{{route('pemesananIndex')}}"><i class="icon-info"> Lihat
                                    Data </i></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="icon-chart"></i></span>
                    </div>
                </div>
            </div>
            @endif
        </div>



        <div class="row">
            @if(Auth::user()->role == 2)
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Pemesanan</h3>
                        <div class="d-inline-block">
                            @if(empty(totalPemesanan())) <h4 class="text-white">Tidak Ada Data</h4> @else <h2
                                class="text-white">{{totalPemesanan()}}</h2> @endif
                            <a class="text-white mb-0" href="{{route('pemesananIndex')}}"><i class="icon-info"> Lihat
                                    Data </i></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="icon-chart"></i></span>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-3">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Barang Masuk</h3>
                        <div class="d-inline-block">
                            @if(empty(totalMasuk())) <h4 class="text-white">Tidak Ada Data</h4> @else <h2
                                class="text-white">{{totalMasuk()}}</h2> @endif
                            <a class="text-white mb-0" href="{{route('masukIndex')}}"><i class="icon-info"> Lihat Data
                                </i></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="icon-chart"></i></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card gradient-4">
                    <div class="card-body">
                        <h3 class="card-title text-white">Data Barang Keluar</h3>
                        <div class="d-inline-block">
                            @if(empty(totalKeluar())) <h4 class="text-white">Tidak Ada Data</h4> @else <h2
                                class="text-white">{{totalKeluar()}}</h2> @endif
                            <a class="text-white mb-0" href="{{route('keluarIndex')}}"><i class="icon-info"> Lihat Data
                                </i></a>
                        </div>
                        <span class="float-right display-5 opacity-5"><i class="icon-chart"></i></span>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
