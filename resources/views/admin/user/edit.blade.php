<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label"
    aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-modal-label" style="padding-left: 10px;">Edit Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post">
                    {{ method_field('put') }}
                    @csrf
                    <div class=" modal-body">
                        <input type="hidden" name="id" id="id">
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

                    </div>
                    <div class="edit modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
                        <button type="submit" class="edit btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
