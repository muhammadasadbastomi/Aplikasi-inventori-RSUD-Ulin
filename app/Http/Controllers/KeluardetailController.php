<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Pemesanan;
use App\Supplier;
use App\Pemesanandetail;
use Illuminate\Http\Request;

class KeluardetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

        public function index($id)
        {
            $pemesanan = pemesanan::where('uuid', $id)->first();
            $pemesanandetail = pemesanandetail::OrderBy('id', 'desc')->where('pemesanan_id', $pemesanan->id)->get();
            $barang = barang::OrderBy('id', 'desc')->get();
            $supplier = supplier::OrderBy('id', 'desc')->get();

            return view('admin.transaksi.keluar.detail.index', compact('pemesanan', 'barang', 'supplier', 'pemesanandetail'));
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $barangkeluar = barang_keluar::where('uuid', $id)->first();

        $data = new Keluardetail;
        $request->request->add(['barangkeluardetail_id' => $data->id]);
        $data->barang_id = $request->barang_id;
        $data->barangkeluar_id = $barangkeluar->id;
        $data->harga = $request->harga;
        $data->jumlah = $request->jumlah;
        $data->subtotal = $request->subtotal;
        $data->save();

        $barang = Barang::findOrFail($data->barang_id);
        $barang->stok = $barang->stok - $request->jumlah;

        if ($barang->stok < 0) {
            $delete = Keluardetail::findOrfail($data->id)->delete();
            return back()->with('warning', 'Stok tidak mencukupi');
        }
        $barang->update();

        $jumlah = $barangkeluar->keluardetail->sum('jumlah');
        $total = $barangkeluar->keluardetail->sum('subtotal');

        $barangkeluar->jumlah_barang = $jumlah;
        $barangkeluar->total = $total;
        $barangkeluar->update();

        return back()->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Keluardetail::where('uuid', $id)->first();
        $jumlah_stok = $data->jumlah;

        $data->delete();

        $barangkeluar = Barang_keluar::findOrFail($data->barangkeluar_id);
        //update stok
        $barang = Barang::findOrFail($data->barang_id);
        $barang->stok = $barang->stok + $jumlah_stok;
        $barang->update();

        // update barang keluar
        $jumlah = $barangkeluar->keluardetail->sum('jumlah');
        $total = $barangkeluar->keluardetail->sum('subtotal');

        return back();
    }
}
