<?php

namespace App\Http\Controllers;

use App\Barang_masuk;
use App\Masukdetail;
use App\Barang;
use Illuminate\Http\Request;

class MasukdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $barangmasuk = Barang_masuk::where('uuid', $id)->first();
        $data = Masukdetail::OrderBy('id', 'desc')->where('barangmasuk_id', $barangmasuk->id)->get();
        $barang = barang::OrderBy('id', 'desc')->get();

        return view('admin.transaksi.masuk.detail.index', compact('pemesanan', 'barang', 'data'));
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
        $barangmasuk = barang_masuk::where('uuid', $id)->first();

        $data = new Masukdetail;
        $request->request->add(['barangmasukdetail_id' => $data->id]);
        $data->barang_id = $request->barang_id;
        $data->barangmasuk_id = $barangmasuk->id;
        $data->harga = $request->harga;
        $data->jumlah = $request->jumlah;
        $data->subtotal = $request->subtotal;
        $data->save();

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
        $data = Masukdetail::where('uuid', $id)->first();

        $data->delete();

        return back();
    }
}
