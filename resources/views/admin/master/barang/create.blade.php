<div class="modal fade text-left" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
    aria-hidden="true" style="display: none;">
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
                        <label>Nama Barang</label>
                        <div class="form-group">
                            <input type="text" name="nama_barang" id="nama_barang" placeholder="Masukkan Nama Barang"
                                value="{{old('nama_barang')}}"
                                class="form-control  @error ('nama_barang') is-invalid @enderror">
                            @error('nama_barang')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <div class="form-group">
                            <label for="merk_id">Merk</label>
                            <select class="custom-select" name="merk_id" id="merk_id">
                                @foreach($merk as $m)
                                <option value="{{$m->id}}">{{ $m->nama_merk}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="satuan_id">Satuan</label>
                            <select class="custom-select" name="satuan_id" id="satuan_id">
                                @foreach($satuan as $s)
                                <option value="{{$s->id}}">{{ $s->nama_satuan}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>Stok</label>
                        <div class="form-group">
                            <input type="number" name="stok" id="stok" placeholder="Masukkan Stok"
                                value="{{old('stok')}}" class="form-control ">
                            @error('stok')<div class="invalid-feedback"> {{$message}} </div>@enderror
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
