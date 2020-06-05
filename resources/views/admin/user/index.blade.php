@extends('layouts/admin')

@section('title') Admin Profile @endsection

@section('head')
<link href="{{url('css/css.css')}}" rel="stylesheet">
@endsection

@section('content')
<div class="content-body">

    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Profile Admin</a></li>
            </ol>
        </div>
    </div>
    <!-- row -->
    <div class="container-fluid">
        <div class="card">
            <div class="row" style="margin-top:47px; margin-bottom: -95px;">
                <div class="col-md-4">
                    <div class="profile-img">
                        <img src="{{ url('img/default.png')}}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h3> {{ Auth::user()->name }} </h3>
                        <br>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                    aria-controls="home" aria-selected="true">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                    aria-controls="profile" aria-selected="false">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="password-tab" data-toggle="tab" href="#password" role="tab"
                                    aria-controls="password" aria-selected="false">Edit Password</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4" style="margin-top:150px; margin-bottom:47px;">
                    <div class="profile-img">
                        <img src="{{ url('logo/blank.jpg')}}" alt="">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Role</label>
                                </div>
                                <div class="col-md-6">
                                    <p> Admin</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nama Lengkap</label>
                                </div>
                                <div class="col-md-6">
                                    <p> {{ Auth::user()->name }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>E-Mail</label>
                                </div>
                                <div class="col-md-6">
                                    <p> {{ Auth::user()->email }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Nomor Telepon</label>
                                </div>
                                <div class="col-md-6">
                                    @if(auth()->user()->telp== !null)
                                    <p>{{ Auth::user()->telp }}</p>
                                    @else
                                    <p> - </p>
                                    @endif
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Alamat</label>
                                </div>
                                <div class="col-md-6">
                                    @if(auth()->user()->alamat== !null)
                                    <p>{{ Auth::user()->alamat }}</p>
                                    @else
                                    <p> - </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <form class="form-valide" method="post" enctype="multipart/form-data">
                                {{ method_field('put') }}
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="name">Nama Lengkap <span
                                            class="text-danger">*</span>
                                        @error('name')<span class="invalid-feedback"><strong> {{$message}}
                                            </strong></span>@enderror
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan Nama Lengkap" value=" {{ Auth::user()->name }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="email">E-mail <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Masukkan E-mail" value=" {{ Auth::user()->email }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="telp">Nomor Telepon
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="text" class="form-control" id="telp" name="telp"
                                            placeholder="Masukkan Nomor Telepon" value="{{Auth::user()->telp}}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="alamat">Alamat
                                    </label>
                                    <div class="col-lg-8">
                                        <textarea class="form-control" id="alamat" name="alamat" rows="5"
                                            placeholder="Masukkan Alamat">{{Auth::user()->alamat}}</textarea>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="photos">Foto
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="file" class="form-control" id="photos" name="photos" rows="5"
                                            placeholder="Masukkan Foto">
                                    </div>
                                </div> --}}
                                <div class="modal-footer" style="margin-right: 45px;">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
                            <form class="form-valide" method="post">
                                {{ method_field('put') }}
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="oldpassword">Password <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control" id="oldpassword" name="oldpassword"
                                            placeholder="Masukkan Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="password">New Password <span
                                            class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Masukkan Password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label" for="password_confirmation">Confirm Password
                                        <span class="text-danger">*</span>
                                    </label>
                                    <div class="col-lg-8">
                                        <input type="password" class="form-control" id="password_confirmation"
                                            name="password_confirmation" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
                                <div class="modal-footer" style="margin-right: 45px;">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                        <br>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
@endsection
