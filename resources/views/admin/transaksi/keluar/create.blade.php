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
                                <option value="{{$d->id}}">{{ $d->id}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="user_id">Nama User</label>
                            <select class="custom-select" name="user_id" id="user_id">
                                @foreach($user as $d)
                                <option value="{{$d->id}}">{{ $d->id}}</option>
                                @endforeach
                            </select>
                        </div>

                        <label>Tanggal Keluar</label>
                        <div class="form-group">
                            <input type="date" name="tgl_keluar" id="tgl_keluar" value="{{old('tgl_keluar')}}" class="form-control">
                            @error('tgl_keluar')<div class="invalid-feedback"> {{$message}} </div>@enderror
                        </div>

                        <label>Jumlah</label>
                        <div class="form-group">
                            <input type="number" name="jumlah" id="jumlah" placeholder="Masukkan Jumlah" value="{{old('jumlah')}}" class="form-control">
                            @error('jumlah')<div class="invalid-feedback"> {{$message}} </div>@enderror
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