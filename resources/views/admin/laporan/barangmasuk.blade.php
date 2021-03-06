<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Barang Masuk</title>
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
        <h3 style="text-align:center;text-transform: uppercase;">Laporan Data Barang Masuk</h3>
        <table class="table table-bordered nowrap">
            <thead>
                <tr>
                    <th rowspan="2" class="text-center">No</th>
                    <th rowspan="2" class="text-center">Tanggal</th>
                    <th rowspan="2" class="text-center">ID Barang Masuk</th>
                    <th rowspan="2" class="text-center">Supplier</th>
                    <th rowspan="2" class="text-center">User</th>
                    <th colspan="6" class="text-center">Detail Barang</th>
                </tr>

                <tr>
                    <th>Nama</th>
                    <th>Merk</th>
                    <th>Satuan</th>
                    <th>Jumlah</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                <tr>
                    <td scope="col" class="text-center align-center">{{$loop->iteration}}</td>
                    <td scope="col" class="text-center align-center">{{\carbon\carbon::parse($d->barangmasuk->tgl_masuk)->translatedFormat('d F Y')}}</td>
                    <td scope="col" class="text-center align-center">PM-{{$d->barangmasuk->id}}</td>
                    <td scope="col" class="text-center">{{$d->barangmasuk->supplier->nama_suppliers }}</td>
                    <td scope="col" class="text-center">{{$d->barangmasuk->user->name }}</td>
                    <td scope="col" class="text-center">{{$d->barang->nama_barang }}</td>
                    <td scope="col" class="text-center">{{$d->barang->merk->nama_merk }}</td>
                    <td scope="col" class="text-center">{{$d->barang->satuan->nama_satuan }}</td>
                    <td scope="col" class="text-center align-center">{{$d->jumlah}}</td>
                    <td scope="col" class="text-center align-right">Rp. {{number_format($d->harga, 0, ',', '.')}},-</td>
                    <td scope="col" class="text-center align-right">Rp. {{number_format($d->subtotal, 0, ',', '.')}},-</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th scope="col" class="align-right" colspan="8">Total</th>
                    <th scope="col" class="align-center">{{$jumlah}}</th>
                    <th scope="col" class="align-right" colspan="2">Rp. {{number_format($total, 0, ',', '.')}},-</th>
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