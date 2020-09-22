<?php

namespace App\Http\Controllers;

use App\Barang;
use App\pemesanan;
use App\pemesanandetail;
use App\Supplier;
use Auth;
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
            'jumlah' => 'required',

        ], $messages);

        $pemesanan = pemesanan::where('uuid', $id)->first();

        $pemesanandet = new pemesanandetail;
        $request->request->add(['pemesanandetail_id' => $pemesanandet->id]);
        $pemesanandet->barang_id = $request->barang_id;
        $pemesanandet->pemesanan_id = $pemesanan->id;
        if($request->harga){

            $pemesanandet->harga = $request->harga;
        }

        $pemesanandet->jumlah = $request->jumlah;
        $pemesanandet->save();

        $sum = $pemesanan->pemesanandetail->sum('jumlah');

        $pemesanan->total = $sum;
        $pemesanan->update();


        $barang = Barang::findOrFail($request->barang_id);
        $barang->stok = $barang->stok - $request->jumlah;
        if ($barang->stok < 0) {
            $delete = pemesanandetail::findOrfail($pemesanandet->id)->delete();
            return back()->with('warning', 'Stok tidak mencukupi');
        }
        $barang->update();

        return back()->with('success', 'Data berhasil ditambah');
    }

    public function updateHarga(Request $req)
    {
        $data = Pemesanandetail::findOrFail($req->detail_id);
        $data->harga = $req->harga;
        $data->update();

        return back()->withSuccess('Data berhasil disimpan');
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
    public function update(Request $request)
    {
        $pemesanan = Pemesanan::where('uuid', $request->uuid)->first();
        $sum = $pemesanan->pemesanandetail->sum('jumlah');

        $pemesanan->total = $sum;
        $pemesanan->update();
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
        $jumlah = $data->jumlah;

        $pemesanan = pemesanan::where('id', $data->pemesanan_id)->first();

        $data->delete();

        $barangkeluar = pemesanan::findOrFail($data->pemesanan_id);
        //update stok
        $barang = Barang::findOrFail($data->barang_id);
        $barang->stok = $barang->stok + $jumlah;
        $barang->update();

        $sum = $pemesanan->pemesanandetail->sum('jumlah');
        $pemesanan->total = $sum;
        $pemesanan->update();

        return back();
    }
}
