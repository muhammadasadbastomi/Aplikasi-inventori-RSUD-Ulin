<?php

namespace App\Http\Controllers;

use App\User;
use Auth;
use Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()){
            $user =  User::find(Auth::user()->id);

            if ($user){
            return view('admin.user.index')->withUser($user);
            } else {
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = User::orderBy('id', 'desc')->get();

        return redirect('admin.user.show', compact('data'));
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
        //dd($request);
        $user = User::find(Auth::User()->id);

        if ($user) {
            $validate = null;
            if (Auth::User()->email === $request['email']){
                $validate = $request->validate([
                    'name' => 'required|min:5',
                    'email'=> 'required|email'
                ]);
            } else {
                $validate = $request->validate([
                    'name' => 'required|min:5',
                    'email'=> 'required|email|unique:users'
                ]);
            }

            if ($validate) {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->telp = $request['telp'];
            $user->alamat = $request['alamat'];

            $user->save();

            return redirect()->back()->with('success', 'Profil berhasil diubah');
            } else {
                return redirect()->back();
            }
        }else {
            return redirect()->back();
        }
    }

    public function updatepass(Request $request)
    {
        $validate = $request->validate([
            'oldpassword' => 'required',
            'password'=> 'required|required_with:password_confirmation',

        ]);

        $user = User::find(Auth::User()->id);

        if($user){
            if (Hash::check($request['oldpassword'], $user->password) && $validate) {
                $user->password = Hash::make($request['password']);

                $user->save();
                return back()->with('success', 'Password berhasil diubah');
            } else {
                return back()->with('warning', 'Password yang dimasukan tidak sama');
            }
        }
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
