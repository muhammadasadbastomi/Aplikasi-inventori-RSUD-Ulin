<?php

namespace App\Http\Controllers;

use App\pemesanan;
use App\pemesanandetail;
use App\Barang;
use App\Supplier;
use Illuminate\Http\Request;

class PemesanandetailController extends Controller
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

        return view('admin.transaksi.pemesanan.detail.index', compact('pemesanan', 'barang', 'supplier', 'pemesanandetail'));
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
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([

            'barang_id' => 'required',
            'supplier_id' => 'required',
            'jumlah' => 'required',

        ], $messages);

        $pemesanan = pemesanan::where('uuid', $id)->first();

        $pemesanandet = new pemesanandetail;
        $request->request->add(['pemesanandetail_id' => $pemesanandet->id]);
        $pemesanandet->barang_id = $request->barang_id;
        $pemesanandet->pemesanan_id = $pemesanan->id;
        $pemesanandet->supplier_id = $request->supplier_id;
        $pemesanandet->jumlah = $request->jumlah;
        $pemesanandet->save();

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
        $data = Pemesanandetail::where('uuid', $id)->first();

        $data->delete();

        return back();
    }
}
