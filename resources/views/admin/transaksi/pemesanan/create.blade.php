<div class="modal fade text-left" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel1" style="padding-left: 10px;">Tambah Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <div class="body">
                        @csrf
                        <div class="form-group">
                            <label for="unit_id">Nama Unit</label>
                            <select class="custom-select" name="unit_id" id="unit_id">
                                @foreach($unit as $d)
                                <option value="{{$d->id}}">{{$d->nama_unit}}</option>
                                @endforeach
                            </select>
                        </div>
                        <label>Tanggal Pesanan</label>
                        <div class="form-group">
                            <input type="date" name="tgl_pesan" id="tgl_pesan" value="{{old('tgl_pesan')}}" class="form-control  @error ('tgl_pesan') is-invalid @enderror">
                            @error('tgl_pesan')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>
                        <label>Alamat</label>
                        <div class="form-group">
                            <textarea name="alamat" id="alamat" placeholder="Masukkan Alamat" class="form-control  @error ('alamat') is-invalid @enderror">{{old('alamat')}}</textarea>
                            @error('alamat')<div class="invalid-feedback"> {{$message}} </div>@enderror
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