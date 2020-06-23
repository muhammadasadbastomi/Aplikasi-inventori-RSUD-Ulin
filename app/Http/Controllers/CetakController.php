<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Barang_keluar;
use App\Barang_masuk;
use App\Keluardetail;
use App\Mail\TagihanEmail;
use App\Masukdetail;
use App\Merk;
use App\pemesanan;
use App\Pemesanandetail;
use App\Satuan;
use App\Supplier;
use App\Unit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use PDF;

class CetakController extends Controller
{
    public function barang()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $data = Barang::all();

        $pdf = PDF::loadview('admin/laporan/barang', compact('data', 'now'));
        return $pdf->stream('laporan-barang-pdf');
    }

    public function barangtgl(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;

        $data = Barang::whereBetween('created_at', [$start, $end])->get();

        $pdf = PDF::loadview('admin/laporan/barangtgl', compact('data', 'now', 'start', 'end'));
        return $pdf->stream('laporan-barang-pdf');
    }

    public function unit()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $data = Unit::all();

        $pdf = PDF::loadview('admin/laporan/unit', compact('data', 'now'));
        return $pdf->stream('laporan-unit-pdf');
    }

    public function unittgl(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;

        $data = Unit::whereBetween('created_at', [$start, $end])->get();

        $pdf = PDF::loadview('admin/laporan/unittgl',  compact('data', 'now', 'start', 'end'));
        return $pdf->stream('laporan-unit-pdf');
    }

    public function satuan()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $data = Satuan::all();

        $pdf = PDF::loadview('admin/laporan/satuan', compact('data', 'now'));
        return $pdf->stream('laporan-satuan-pdf');
    }

    public function satuantgl(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;
        $data = Satuan::whereBetween('created_at', [$start, $end])->get();

        $pdf = PDF::loadview('admin/laporan/satuantgl', compact('data', 'now', 'start', 'end'));
        return $pdf->stream('laporan-satuan-pdf');
    }

    public function merk()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $data = Merk::all();

        $pdf = PDF::loadview('admin/laporan/merk', compact('data', 'now'));
        return $pdf->stream('laporan-merk-pdf');
    }

    public function merktgl(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;
        $data = Merk::whereBetween('created_at', [$start, $end])->get();

        $pdf = PDF::loadview('admin/laporan/merktgl', compact('data', 'now', 'start', 'end'));
        return $pdf->stream('laporan-merk-pdf');
    }

    public function supplier()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $data = Supplier::all();

        $pdf = PDF::loadview('admin/laporan/supplier', compact('data', 'now'));
        return $pdf->stream('laporan-supplier-pdf');
    }

    public function suppliertgl(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;
        $data = Supplier::whereBetween('created_at', [$start, $end])->get();

        $pdf = PDF::loadview('admin/laporan/suppliertgl', compact('data', 'now', 'start', 'end'));
        return $pdf->stream('laporan-supplier-pdf');
    }

    public function pemesanan()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $data = Pemesanandetail::all();
        $count = $data->sum('harga');
        $jumlah = $data->sum('jumlah');

        $pdf = PDF::loadview('admin/laporan/pemesanan', compact('data', 'now', 'count', 'jumlah'));
        return $pdf->stream('laporan-pemesanan-pdf');
    }

    public function invoicePemesanan($uuid)
    {
        $data = Pemesanandetail::where('pemesanan_id', $uuid)->get();
        $pemesanan = pemesanan::findOrFail($uuid);

        $pemesanan->status = 1;
        $pemesanan->update();

        $count = $pemesanan->pemesanandetail->sum('harga');
        $jumlah = $pemesanan->pemesanandetail->sum('jumlah');
        $pdf = PDF::loadview('admin/laporan/invoicePemesanan', compact('data', 'count', 'jumlah', 'pemesanan'));
        $path = public_path('invoice/');
        $fileName = 'invoice-' . $pemesanan->id . '.' . 'pdf';
        $pdf->save($path . '/' . $fileName);
        Mail::to($pemesanan->user->email)->send(new TagihanEmail($pemesanan));
        // $message->to($pemesanan->user->email, $pemesanan->unit->nama_uit)

        //     ->subject('Informasi tagihan unit' . $pemesanan->unit->nama_unit)

        //     ->attachData($pdf->output(), "invoice.pdf");

        return redirect()->back()->withSuccess('Berhasil verifikasi dan mengirim email ke '.$pemesanan->user->name.'');
    }

    public function pemesanantgl(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;

        $data = Pemesanandetail::join('pemesanans', 'pemesanans.id', '=', 'pemesanandetails.pemesanan_id')
            ->whereBetween('pemesanans.tgl_pesan', [$start, $end])->get();

        $count = $data->sum('harga');
        $jumlah = $data->sum('jumlah');

        $pdf = PDF::loadview('admin/laporan/pemesanantgl',  compact('data', 'now', 'start', 'end', 'jumlah', 'count'));
        return $pdf->stream('laporan-pemesanantgl-pdf');
    }

    public function masuk()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $data = Masukdetail::all();
        $jumlah = Barang_masuk::sum('jumlah_barang');
        $total = Barang_masuk::sum('total');

        $pdf = PDF::loadview('admin/laporan/barangmasuk', compact('data', 'total', 'jumlah', 'now'));
        return $pdf->stream('laporan-barangmasuk-pdf');
    }

    public function masuktgl(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;

        $data = Masukdetail::join('barangmasuks', 'barangmasuks.id', '=', 'barangmasukdetails.barangmasuk_id')
            ->whereBetween('barangmasuks.tgl_masuk', [$start, $end])
            ->get();
        $jumlah = Masukdetail::join('barangmasuks', 'barangmasuks.id', '=', 'barangmasukdetails.barangmasuk_id')
            ->whereBetween('barangmasuks.tgl_masuk', [$start, $end])
            ->sum('barangmasukdetails.jumlah');
        $total = Masukdetail::join('barangmasuks', 'barangmasuks.id', '=', 'barangmasukdetails.barangmasuk_id')
            ->whereBetween('barangmasuks.tgl_masuk', [$start, $end])
            ->sum('barangmasukdetails.subtotal');

        $pdf = PDF::loadview('admin/laporan/barangmasuktgl', compact('data', 'start', 'end', 'jumlah', 'total', 'now'));
        return $pdf->stream('laporan-barangmasuktgl-pdf');
    }

    public function keluar()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $data = Keluardetail::all();
        $jumlah = Barang_keluar::sum('jumlah_barang');
        $total = Barang_keluar::sum('total');

        $pdf = PDF::loadview('admin/laporan/barangkeluar', compact('data', 'total', 'jumlah', 'now'));
        return $pdf->stream('laporan-barangkeluar-pdf');
    }

    public function keluartgl(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;

        $data = Keluardetail::join('barangkeluars', 'barangkeluars.id', '=', 'barangkeluardetails.barangkeluar_id')
            ->whereBetween('barangkeluars.tgl_keluar', [$start, $end])
            ->get();
        $jumlah = Keluardetail::join('barangkeluars', 'barangkeluars.id', '=', 'barangkeluardetails.barangkeluar_id')
            ->whereBetween('barangkeluars.tgl_keluar', [$start, $end])
            ->sum('barangkeluardetails.jumlah');
        $total = Keluardetail::join('barangkeluars', 'barangkeluars.id', '=', 'barangkeluardetails.barangkeluar_id')
            ->whereBetween('barangkeluars.tgl_keluar', [$start, $end])
            ->sum('barangkeluardetails.subtotal');

        $pdf = PDF::loadview('admin/laporan/barangkeluartgl', compact('data', 'start', 'end', 'jumlah', 'total', 'now'));
        return $pdf->stream('laporan-barangkeluartgl-pdf');
    }

    public function stok()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $data = Barang::all();

        $pdf = PDF::loadview('admin/laporan/stok', compact('data', 'now'));
        return $pdf->stream('laporan-stok-pdf');
    }

    public function stoktgl(Request $request)
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $start = $request->start;
        $end = $request->end;
        $data = Barang::whereBetween('created_at', [$start, $end])->get();

        $pdf = PDF::loadview('admin/laporan/stoktgl', compact('data', 'now', 'start', 'end'));
        return $pdf->stream('laporan-stok-pdf');
    }

    public function stokhbs()
    {
        $now = Carbon::now()->translatedFormat('l, d F Y');
        $data = Barang::where('stok', '<', 6)->get();

        $pdf = PDF::loadview('admin/laporan/stokhbs', compact('data', 'now'));
        return $pdf->stream('laporan-stokhbs-pdf');
    }
}
