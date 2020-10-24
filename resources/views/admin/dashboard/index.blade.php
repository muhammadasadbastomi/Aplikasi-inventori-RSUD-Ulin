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
        </div>

        <div class="row">
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
        <br>
        <div class="row">
            <div class="col-sm-12 text-center">
                <img style="height:87%; width: 50%;" src="{{asset('logo/logo.png')}}" alt="">
            </div>
            <div class=" col-sm-12">
                <div class="card-title">
                    Cara Pemesanan Admin Lab :
                </div>
                <div class="card-body">
                    <p>

                        1. Pilih menu Transaksi -> pemesanan.
                    </p>
                    <p>
                        2. Kemudian klik tombol tambah data dan isi inputan yang ada.
                    </p>
                    <p>
                        3. Kemudian klik tombol + pada aksi untuk mengisi barang apa saja yang akan dipesan.

                    </p>
                    <p>
                        4. Kemudian klik tambah data di halaman detail pemesanan dan silahkan input pesanan yang akan
                        anda pilih.
                    </p>
                    <p>
                        5. Kemudian tunggu admin untuk mengkonfirmasi pesanan anda.
                    </p>
                    <p>
                        6. Jika admin sudah mengkonfirmasi pesanan anda maka akan ada notifikasi melalui email.
                    </p>
                </div>
            </div>
            <br>
            <div class=" col-sm-12">
                <div class="card-title">
                    Cara Konfirmasi pemesanan Admin :
                </div>
                <div class="card-body">
                    <p>

                        1. Pilih menu Transaksi -> pemesanan.
                    </p>
                    <p>
                        2. Kemudian Pilih pemesanan yang tersedia.
                    </p>
                    <p>
                        3. Kemudian klik tombol + pada aksi untuk mengisi harga barang.

                    </p>
                    <p>
                        4. Kemudian kembali dan klik tombol centang pada aksi untuk mengkonfirmasi pemesanan.
                    </p>
                    <p>
                        5. Jika berhasil maka akan ada notifikasi pemesanan berhasil dan email terkirim kepada email
                        pemesan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
