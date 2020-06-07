<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Merk;
use App\Satuan;
use Illuminate\Http\Request;

class StokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Barang::OrderBy('id', 'desc')->get();
        $satuan = Satuan::OrderBy('id', 'desc')->get();
        $merk = Merk::OrderBy('id', 'desc')->get();

        return view('admin.master.stok.index', compact('data', 'merk', 'satuan'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stok  $stok
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
     * @param  \App\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $messages = [
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([
            'stok' => 'required',
        ], $messages);
        $barang = Barang::findOrFail($request->id);
        $barang->stok = $request->stok;
        $barang->update();

        return back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stok  $stok
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
