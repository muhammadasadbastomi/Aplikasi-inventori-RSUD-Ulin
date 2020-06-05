<div class="modal fade text-left" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1" style="padding-left: 10px;">Tambah User Lab</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="body">
                        @csrf
                        <label>Nama</label>
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Masukkan Nama Lengkap"
                                value="{{old('name')}}" class="form-control  @error ('name') is-invalid @enderror">
                            @error('name')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Email</label>
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Masukkan Email"
                                value="{{old('email')}}" class="form-control ">
                            @error('email')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Password</label>
                        <div class="form-group">
                            <input type="password" name="password" id="password" placeholder="Masukkan Password"
                                value="{{old('password')}}" class="form-control ">
                            @error('password')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Konfirmasi Password</label>
                        <div class="form-group">
                            <input type="password" name="passwordconfirm" id="passwordconfirm"
                                placeholder="Masukkan Konfirmasi Password" value="{{old('passwordconfirm')}}"
                                class="form-control ">
                            @error('passwordconfirm')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
