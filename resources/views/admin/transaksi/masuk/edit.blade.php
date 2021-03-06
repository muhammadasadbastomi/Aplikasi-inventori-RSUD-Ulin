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
                        <div class="form-group">
                            <label for="supplier_id">Nama Supplier</label>
                            <select class="custom-select" name="supplier_id" id="supplier_id">
                                @foreach($supplier as $d)
                                <option value="{{$d->id}}">{{ $d->nama_suppliers}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>Tanggal Masuk</label>
                        <div class="form-group">
                            <input type="date" name="tgl_masuk" id="tgl_masuk" placeholder="Masukkan Nama Barang"
                                value="{{old('tgl_masuk')}}"
                                class="form-control  @error ('tgl_masuk') is-invalid @enderror">
                            @error('tgl_masuk')<div class="invalid-feedback"> {{$message}} </div>@enderror
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
