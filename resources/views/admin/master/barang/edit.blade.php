<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
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
                        <div class="form-group">
                            <label class="col-form-label" for="nama_barang">Nama Barang</label>
                            <input type="text" class="form-control @error ('nama_barang') is-invalid @enderror" placeholder="Masukkan Nama Barang" name="nama_barang" value="{{old('nama_barang')}}" id="nama_barang" autofocus>
                            @error('nama_barang')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="merk_id">Merk</label>
                            <select class="custom-select" name="merk_id" id="merk_id">
                                @foreach($merk as $d)
                                <option value="{{$d->id}}">{{$d->nama_merk}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="satuan_id">Satuan</label>
                            <select class="custom-select" name="satuan_id" id="satuan_id">
                                @foreach($satuan as $d)
                                <option value="{{$d->id}}">{{$d->nama_satuan}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label" for="stok">Stok Barang</label>
                            <input type="number" class="form-control @error ('stok') is-invalid @enderror" placeholder="Masukkan Stok Barang" name="stok" value="{{old('stok')}}" id="stok" autofocus>
                            @error('stok')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                    </div>
                    <div class="edit modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="edit btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>