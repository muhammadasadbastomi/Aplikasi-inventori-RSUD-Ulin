<div class="modal fade text-left" id="modalTambah1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
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
                    {{-- <div class="body">
                        @csrf
                        <div class="form-group">
                            <label for="supplier_id">Nama supplier</label>
                            <select class="custom-select" name="supplier_id" id="supplier_id">
                                @foreach($supplier as $d)
                                <option value="{{$d->id}}">{{$d->nama_suppliers}}</option>
                    @endforeach
                    </select>
            </div>
            <div class="form-group">
                <label for="barang_id">Nama Barang</label>
                <select class="custom-select" name="barang_id" id="barang_id">
                    @foreach($barang as $d)
                    <option value="{{$d->id}}">{{$d->nama_barang}}</option>
                    @endforeach
                </select>
            </div>
            <label>Jumlah</label>
            <div class="form-group">
                <input type="number" name="jumlah" id="jumlah" value="{{old('jumlah')}}"
                    class="form-control  @error ('jumlah') is-invalid @enderror">
                @error('jumlah')<div class="invalid-feedback"> {{$message}} </div>@enderror
            </div>
        </div> --}}
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
        </form>
    </div>
</div>
</div>
</div>
