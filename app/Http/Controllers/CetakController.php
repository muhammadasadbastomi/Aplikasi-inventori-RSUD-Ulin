<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use App\Barang;
use App\Barang_masuk;
use App\Masukdetail;
use App\Merk;
use App\Pemesanandetail;
use App\Satuan;
use App\Supplier;
use App\Unit;
use Illuminate\Support\Facades\DB;

class CetakController extends Controller
{
    public function barang()
    {
        $data = Barang::all();

        $pdf = PDF::loadview('admin/laporan/barang', compact('data'));
        return $pdf->stream('laporan-barang-pdf');
    }

    public function unit()
    {
        $data = Unit::all();

        $pdf = PDF::loadview('admin/laporan/unit', compact('data'));
        return $pdf->stream('laporan-unit-pdf');
    }

    public function satuan()
    {
        $data = Satuan::all();

        $pdf = PDF::loadview('admin/laporan/satuan', compact('data'));
        return $pdf->stream('laporan-satuan-pdf');
    }

    public function merk()
    {
        $data = Merk::all();

        $pdf = PDF::loadview('admin/laporan/merk', compact('data'));
        return $pdf->stream('laporan-merk-pdf');
    }

    public function supplier()
    {
        $data = Supplier::all();

        $pdf = PDF::loadview('admin/laporan/supplier', compact('data'));
        return $pdf->stream('laporan-supplier-pdf');
    }

    public function pemesanan()
    {
        $data = Pemesanandetail::all();

        $pdf = PDF::loadview('admin/laporan/pemesanan', compact('data'));
        return $pdf->stream('laporan-pemesanan-pdf');
    }

    public function pemesanantgl(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $data = Pemesanandetail::join('pemesanans', 'pemesanans.id', '=', 'pemesanandetails.pemesanan_id')
            ->whereBetween('pemesanans.tgl_pesan', [$start, $end])->get();

        $pdf = PDF::loadview('admin/laporan/pemesanantgl', compact('data'));
        return $pdf->stream('laporan-pemesanantgl-pdf');
    }

    public function masuk()
    {
        $data = Masukdetail::all();

        $pdf = PDF::loadview('admin/laporan/barangmasuk', compact('data'));
        return $pdf->stream('laporan-barangmasuk-pdf');
    }

    public function masuktgl(Request $request)
    {
        $start = $request->start;
        $end = $request->end;

        $data = Masukdetail::join('barangmasuks', 'barangmasuks.id', '=', 'barangmasukdetails.barangmasuk_id')
            ->whereBetween('barangmasuks.tgl_masuk', [$start, $end])->get();

        $pdf = PDF::loadview('admin/laporan/barangmasuktgl', compact('data', 'start', 'end'));
        return $pdf->stream('laporan-barangmasuktgl-pdf');
    }
}
