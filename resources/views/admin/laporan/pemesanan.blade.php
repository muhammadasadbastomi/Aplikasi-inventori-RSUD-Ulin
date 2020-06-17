<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pemesanan Barang</title>
    <link rel="icon" type="image/png" href="{{url('logo/logo.png')}}">
    <style>
        .logo {
            margin-top: 15px;
            float: left;
            width: 17%;
            padding: 0px;
            text-align: right;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            font-size: 13px;
            border: 1px solid;
            padding-left: 5px;
            text-align: center;
        }

        .judul {
            text-align: center;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }

        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }

        .sizeimg {
            width: 100px;
        }

        .headtext {
            float: right;
            margin-left: 0px;
            width: 75%;
            padding-left: 0px;
            padding-right: 10%;
        }

        .header {
            margin-bottom: 0px;
            text-align: center;
            height: 150px;
            padding: 0px;
        }

        .ttd {
            margin-left: 70%;
            text-align: center;
            text-transform: uppercase;
        }

        hr {
            margin-top: 10%;
            height: 3px;
            background-color: black;
        }

        br {
            margin-bottom: 5px !important;
        }

        h5 {
            line-height: 0.3;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="logo">
            <img class="sizeimg" src="logo/logo.png">
        </div>
        <div class="headtext">
            <h2 style="margin:0px;">Gudang Laboratorium Patologi Klinik</h2>
            <h2 style="margin:0px;">Rumah Sakit Umum Daerah Ulin</h2>
            <p style="margin:0px;">Jl. A.Yani Km 2,5 Kota Banjarmasin, Kalimantan Selatan 70233</p>
        </div>
        <hr>
    </div>

    <div class="container" style="margin-top:-40px;">
        <h3 style="text-align:center;text-transform: uppercase;">Laporan Data Pemesanan Barang</h3>
        <table class="table table-bordered nowrap">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center">No</th>
                    <th rowspan="2" class="text-center">Tanggal</th>
                    <th rowspan="2" class="text-center">ID Pemesanan</th>
                    <th rowspan="2" class="text-center">Unit</th>
                    <th rowspan="2" class="text-center">Admin</th>
                    <th colspan="5" class="text-center">Detail Barang</th>
                </tr>

                <tr>
                    <th>Nama</th>
                    <th>Merk</th>
                    <th>Satuan</th>
                    <th>Jumlah Pesan</th>
                    <th>Harga Jual</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td scope="col" class="text-center">{{$loop->iteration}}</td>
                    <td scope="col" class="text-center">
                        {{\carbon\carbon::parse($d->pemesanan->tgl_pesan)->translatedFormat('d F Y')}}</td>
                    <td scope="col" class="text-center">PM-{{$d->pemesanan->id}}</td>
                    <td scope="col" class="text-center">{{$d->pemesanan->unit->nama_unit }}</td>
                    <td scope="col" class="text-center">{{$d->pemesanan->user->name }}</td>
                    <td scope="col" class="text-center">{{$d->barang->nama_barang }}</td>
                    <td scope="col" class="text-center">{{$d->barang->merk->nama_merk }}</td>
                    <td scope="col" class="text-center">{{$d->barang->satuan->nama_satuan }}</td>
                    <td scope="col" class="text-center">{{$d->jumlah}} </td>
                    <td scope="col" class="text-center">@currency($d->harga),-</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="8">Total</td>
                    <td>{{$jumlah}}</td>
                    <td>@currency($count),-</td>
                </tr>
            </tfoot>
        </table>
        <small>Dicetak Pada : {{$now}}</small>
        <br>
        <br>
        <div class="ttd">
            <h5>
                Banjarmasin,
            </h5>
            <h5>Kepala Gudang</h5>
            <br>
            <br>
            <h5 style="text-decoration:underline;">Maulana Irfan, S.Kom</h5>
            <h5>Penanggung jawab</h5>
            <h5>NIK. 201101 19920709 7</h5>
        </div>
    </div>
</body>

</html>