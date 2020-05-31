<?php

namespace App\Http\Controllers;

use App\Barang_keluar;
use App\Unit;
use App\User;
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
        $data = Barang_keluar::OrderBy('id', 'desc')->get();

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang_keluar  $barang_keluar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang_keluar $barang_keluar)
    {
        //
    }
}
