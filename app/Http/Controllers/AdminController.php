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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data = User::where('role', [2])->orderBy('id', 'desc')->get();

        return view('admin.user.show', compact('data'));
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
            'email'=> 'required|email|unique:users',
            'password'=> 'required|required_with:password_confirmation',

        ], $messages);

        $data = new User;
        if ($data) {
        $data->name = $request->name;
        $data->email = $request->email;
        $data->role = 2;
        $data->password = Hash::make($request->password);
        $data->photos = $request->photos;
        if ($request->hasfile('photos')) {
            $img = $request->file('photos');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $request->name;
            $photos = $FotoName . '.' . $FotoExt;
            $img->move('images/user', $photos);
            $data->photos = $photos;
            $data->update();
        }

        $data->save();

        return back()->with('success', 'Data berhasil disimpan');
        } else {
            return back()->with('danger', 'data gagal disimpan');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, User $user )
    {
        $validate = $request->validate([
             'password'=> 'required|required_with:passwordconfirm',

         ]);

         $user = User::findOrFail($request->id);

         if($user){
                $user->password = Hash::make($request->password);

                $user->save();
                return back()->with('success', 'Password berhasil diubah');
             }  else {
                return back()->with('warning', 'Password yang dimasukan tidak sama');
             }

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
            if (isset($request->email)){
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
            if ($request->photos != null) {
                $img = $request->file('photos');
                $FotoExt = $img->getClientOriginalExtension();
                $FotoName = $request->name;
                $photos = $FotoName . '.' . $FotoExt;
                $img->move('images/user', $photos);
                $user->photos = $photos;
                $user->update();
            }


            $user->update();
            }
            return redirect()->back()->with('success', 'Profil berhasil diubah');
            } elseif (isset($request->password)){
                $messages = [
                    'confirmed' => ':attribute tidak sama.',
                    'same' => ':attribute tidak sama.'
                ];
                $validate = $request->validate([
                    'password'=> 'same:password_confirmation', 'confirmed',

                ], $messages);

                if (Hash::check($request['oldpassword'], $user->password) && $validate) {
                    $user->password = Hash::make($request['password']);
                } else {
                    return back()->with('warning', 'Password Salah');
                }
            }

    }
    }

    public function updatepass(Request $request)
    {
        // $validate = $request->validate([
        //     'oldpassword' => 'required',
        //     'password'=> 'required|required_with:password_confirmation',

        // ]);

        // $user = User::find(Auth::User()->id);

        // if($user){
        //     if (Hash::check($request['oldpassword'], $user->password) && $validate) {
        //         $user->password = Hash::make($request['password']);

        //         $user->save();
        //         return back()->with('success', 'Password berhasil diubah');
        //     } else {
        //         return back()->with('warning', 'Password yang dimasukan tidak sama');
        //     }
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('uuid', $id)->first()->delete();

        return back();
    }
}
