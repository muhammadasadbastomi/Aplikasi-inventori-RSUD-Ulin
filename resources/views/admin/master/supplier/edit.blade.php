<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-modal-label" style="padding-left: 10px;">Edit Supplier</h4>
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
                        <div class="form-group">
                            <label class="col-form-label" for="nama_suppliers">Nama Supplier</label>
                            <input type="text" class="form-control @error ('nama_suppliers') is-invalid @enderror" placeholder="Masukkan Supplier" name="nama_suppliers" value="{{old('nama_suppliers')}}" id="nama_suppliers" autofocus>
                            @error('nama_suppliers')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="alamat">Alamat</label>
                            <textarea type="text" class="form-control @error ('alamat') is-invalid @enderror" placeholder="Masukkan Alamat" name="alamat" id="alamat" autofocus>{{old('alamat')}}</textarea>
                            @error('alamat')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="telepon">Telepon</label>
                            <input type="number" class="form-control @error ('telepon') is-invalid @enderror" placeholder="Masukkan Satuan" name="telepon" value="{{old('telepon')}}" id="telepon" autofocus>
                            @error('telepon')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="keterangan">Keterangan</label>
                            <textarea type="text" class="form-control @error ('keterangan') is-invalid @enderror" placeholder="Masukkan Satuan" name="keterangan" id="keterangan" autofocus>{{old('keterangan')}}</textarea>
                            @error('keterangan')<div class="invalid-feedback"> {{$message}} </div>@enderror
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