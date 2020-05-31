@extends('layouts/admin')

@section('title') Admin Profile @endsection

@section('head')
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
        <div class="row">
            <div class="col-lg-4 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center mb-4">
                            <img class="mr-3" src="images/avatar/11.png" width="80" height="80" alt="">
                            <div class="media-body">
                                <h3 class="mb-0">Pikamy Cha</h3>
                                <p class="text-muted mb-0">Canada</p>
                            </div>
                        </div>

                        <h4>About Me</h4>
                        <p class="text-muted">Hi, I'm Pikamy, has been the industry standard dummy text ever since the 1500s.</p>
                        <ul class="card-profile__info">
                            <li class="mb-1"><strong class="text-dark mr-4">Mobile</strong> <span>01793931609</span></li>
                            <li><strong class="text-dark mr-4">Email</strong> <span>name@domain.com</span></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-xl-9">
                <div class="card">
                    <div class="card-body">
                        <form class="form-valide" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="val-username">Username <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a username..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="val-email">Email <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Your valid email..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="val-password">Password <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Choose a safe one..">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-9">
                                    <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="..and confirm it!">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="telp">Nomor Telepon
                                </label>
                                <div class="col-lg-9">
                                    <input type="text" class="form-control" id="telp" name="telp" placeholder="212-999-0000">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-3 col-form-label" for="alamat">Alamat
                                </label>
                                <div class="col-lg-9">
                                    <textarea class="form-control" id="alamat" name="alamat" rows="5" placeholder="What would you like to see?"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    </>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    @endsection

    @section('script')
    @endsection