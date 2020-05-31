<?php

namespace App\Http\Controllers;

use App\pemesanan;
use App\Unit;
use App\User;
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
        $data = pemesanan::OrderBy('id', 'desc')->get();

        return view('admin.transaksi.pemesanan.index', compact('data', 'unit', 'user'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(pemesanan $pemesanan)
    {
        //
    }
}
