<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $supplier = supplier::orderBy('id', 'desc')->get();

        return view('admin.master.supplier.index', compact('supplier'));
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

            'nama_supplier' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'keterangan' => 'required',
        ], $messages);

        // create new object
        $supplier = new supplier;
        $request->request->add(['supplier_id' => $supplier->id]);
        $supplier->nama_suppliers = $request->nama_supplier;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->keterangan = $request->keterangan;
        $supplier->save();

        return back()->with('success', 'Data berhasil disimpan');
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
        $messages = [
            'unique' => ':attribute sudah terdaftar.',
            'required' => ':attribute harus diisi.',
        ];
        $request->validate([

            'nama_suppliers' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'keterangan' => 'required',
        ], $messages);

        // create new object
        $supplier = supplier::findOrFail($request->id);
        $supplier->nama_suppliers = $request->nama_suppliers;
        $supplier->alamat = $request->alamat;
        $supplier->telepon = $request->telepon;
        $supplier->keterangan = $request->keterangan;
        $supplier->update();

        return back()->with('success', 'Data berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
