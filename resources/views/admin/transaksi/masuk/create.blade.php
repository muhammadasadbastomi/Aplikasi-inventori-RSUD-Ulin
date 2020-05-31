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
                            <label for="supllier_id">Nama Supplier</label>
                            <select class="custom-select" name="supllier_id" id="supllier_id">
                                @foreach($supplier as $d)
                                <option value="{{$d->id}}">{{ $d->id}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="user_id">User</label>
                            <select class="custom-select" name="user_id" id="user_id">
                                @foreach($user as $d)
                                <option value="{{$d->id}}">{{ $d->id}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>Tanggal Masuk</label>
                        <div class="form-group">
                            <input type="date" name="tgl_masuk" id="tgl_masuk" placeholder="Masukkan Nama Barang" value="{{old('tgl_masuk')}}" class="form-control  @error ('tgl_masuk') is-invalid @enderror">
                            @error('tgl_masuk')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Total</label>
                        <div class="form-group">
                            <input type="number" name="total" id="total" placeholder="Masukkan total" value="{{old('total')}}" class="form-control ">
                            @error('total')<div class="invalid-feedback"> {{$message}} </div>@enderror
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