<?php

namespace App\Http\Controllers;

use App\Barang_masuk;
use App\Supplier;
use App\User;
use Illuminate\Http\Request;

class BarangmasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::orderBy('id', 'DESC')->get();
        $supplier = Supplier::orderBy('id', 'DESC')->get();
        $data = Barang_masuk::OrderBy('id', 'desc')->get();

        return view('admin.transaksi.masuk.index', compact('data', 'supplier', 'user'));
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
     * @param  \App\Barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function show(Barang_masuk $barang_masuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang_masuk $barang_masuk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang_masuk $barang_masuk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang_masuk  $barang_masuk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang_masuk $barang_masuk)
    {
        //
    }
}
