<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Merk;
use App\Satuan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = Barang::orderBy('id', 'desc')->get();
        $merk = Merk::orderBy('id', 'desc')->get();
        $satuan = Satuan::OrderBy('id', 'desc')->get();

        return view('admin.master.barang.index', compact('barang', 'merk', 'satuan'));
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
            'mimes' => 'photo berupa :attribute.'
        ];
        $request->validate([

            'nama_barang' => 'required',
            'merk_id' => 'required',
            'satuan_id' => 'required',

        ], $messages);

        // create new object
        $barang = new barang;
        $request->request->add(['barang_id' => $barang->id]);
        $barang->nama_barang = $request->nama_barang;
        $barang->merk_id = $request->merk_id;
        $barang->satuan_id = $request->satuan_id;
        $barang->stok = $request->stok;
        $barang->save();

        return back()->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        return view('admin.master.barang.edit', compact(''));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
            'mimes' => 'photo berupa :attribute.'
        ];
        $request->validate([

            'nama_barang' => 'required',
            'merk_id' => 'required',
            'satuan_id' => 'required',

        ], $messages);
        $barang = Barang::findOrFail($request->id);
        $barang->nama_barang = $request->nama_barang;
        $barang->merk_id = $request->merk_id;
        $barang->satuan_id = $request->satuan_id;
        $barang->update();

        return back()->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::where('uuid', $id)->first();
        $barang->delete();

        return back();
    }
}
