<?php

namespace App\Http\Controllers;

use App\Barang;
use App\pemesanan;
use App\Unit;
use App\User;
use Auth;
use Illuminate\Http\Request;

class PemesananController extends Controller
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
        $pemesanan = pemesanan::OrderBy('id', 'desc')->get();
        $barang = barang::OrderBy('id', 'desc')->get();

        return view('admin.transaksi.pemesanan.index', compact('pemesanan', 'barang', 'unit', 'user'));
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
            'alamat' => 'required',
            'tgl_pesan' => 'required',

        ], $messages);

        // create new object
        $pemesanan = new pemesanan;
        $request->request->add(['pemesanan_id' => $pemesanan->id]);
        $pemesanan->unit_id = $request->unit_id;
        $pemesanan->user_id = Auth::user()->id;
        $pemesanan->alamat = $request->alamat;
        $pemesanan->tgl_pesan = $request->tgl_pesan;
        $pemesanan->total = 0;
        $pemesanan->save();

        return back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pemesanan $pemesanan)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
            'mimes' => 'photo berupa :attribute.',
        ];
        $request->validate([

            'unit_id' => 'required',
            'user_id' => 'required',
            'alamat' => 'required',
            'tgl_pesan' => 'required',

        ], $messages);
        $pemesanan = pemesanan::findOrFail($request->id);
        $pemesanan->unit_id = $request->unit_id;
        $pemesanan->user_id = $request->user_id;
        $pemesanan->alamat = $request->alamat;
        $pemesanan->tgl_pesan = $request->tgl_pesan;
        $pemesanan->update();

        return back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = pemesanan::where('uuid', $id)->first()->delete();

        return back();
    }
}
