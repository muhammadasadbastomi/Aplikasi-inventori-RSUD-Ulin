<?php

namespace App\Http\Controllers;

use App\Satuan;
use Illuminate\Http\Request;

class satuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuan = satuan::orderBy('id', 'desc')->get();

        return view('admin.master.satuan.index', compact('satuan'));

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

            'nama_satuan' => 'required',
        ], $messages);

        // create new object
        $satuan = new satuan;
        $request->request->add(['satuan_id' => $satuan->id]);
        $satuan->nama_satuan = $request->nama_satuan;
        $satuan->save();

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

            'nama_satuan' => 'required',

        ], $messages);

        $satuan = Satuan::findOrFail($request->id);
        $satuan->nama_satuan = $request->nama_satuan;
        $satuan->update();
        // dd($data);
        return back()->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $satuan = satuan::where('uuid', $id)->first();

        $satuan->delete();

        return redirect()->route('satuanIndex');
    }
}
