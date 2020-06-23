<?php

namespace App\Http\Controllers;

use App\Pemesanan;
use App\Unit;
use App\User;
use Auth;
use Illuminate\Http\Request;

class BarangkeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unit = Unit::OrderBy('id', 'desc')->get();
        $user = User::OrderBy('id', 'desc')->get();
        $data = Pemesanan::where('status',1)->OrderBy('id', 'desc')->get();
        $data = $data->map(function($item){
            $data = $item->pemesanandetail->sum('harga');
            $item['totalharga'] = $item->pemesanandetail->sum('harga');
            return $item;
        });

        return view('admin.transaksi.keluar.index', compact('data', 'unit', 'user'));
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
    public function store(Request $request)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([

            'unit_id' => 'required',
            'tgl_keluar' => 'required',

        ], $messages);

        // create new object
        $barangkeluar = new Barang_keluar;
        $request->request->add(['barangkeluar_id' => $barangkeluar->id]);
        $barangkeluar->unit_id = $request->unit_id;
        $barangkeluar->user_id = Auth::user()->id;
        $barangkeluar->tgl_keluar = $request->tgl_keluar;
        $barangkeluar->jumlah_barang = 0;
        $barangkeluar->save();

        return back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_keluar $barang_keluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang_keluar $barang_keluar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang_keluar $barang_keluar)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([

            'unit_id' => 'required',
            'tgl_keluar' => 'required',

        ], $messages);

        $barangkeluar = Barang_keluar::findOrFail($request->id);
        $barangkeluar->unit_id = $request->unit_id;
        $barangkeluar->user_id = Auth::user()->id;
        $barangkeluar->tgl_keluar = $request->tgl_keluar;
        $barangkeluar->update();

        return back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Barang_keluar::where('uuid', $id)->first()->delete();

        return back();
    }
}
