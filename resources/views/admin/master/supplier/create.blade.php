<div class="modal fade text-left" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1" style="padding-left: 10px;">Tambah Supplier</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="body">
                        @csrf
                        <label>Nama Supplier</label>
                        <div class="form-group">
                            <input type="text" name="nama_supplier" id="nama_supplier" placeholder="Masukkan Nama Supplier" value="{{old('nama_supplier')}}" class="form-control  @error ('nama_supplier') is-invalid @enderror">
                            @error('nama_supplier')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <label>Alamat</label>
                        <div class="form-group">
                            <textarea type="text" name="alamat" id="alamat" placeholder="Masukkan Alamat" class="form-control @error ('alamat') is-invalid @enderror"> {{old('alamat')}}</textarea>
                            @error('alamat')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <label>Telepon</label>
                        <div class="form-group">
                            <input type="number" name="telepon" id="telepon" placeholder="Masukkan Nomor Telepon" value="{{old('telepon')}}" class="form-control  @error ('telepon') is-invalid @enderror">
                            @error('telepon')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <label>Keterangan</label>
                        <div class="form-group">
                            <textarea type="text" name="keterangan" id="keterangan" placeholder="Masukkan Keterangan" class="form-control @error ('keterangan') is-invalid @enderror"> {{old('keterangan')}}</textarea>
                            @error('keterangan')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
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