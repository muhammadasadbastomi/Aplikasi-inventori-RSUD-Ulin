    <!-- Modal Edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="edit-modal-label" style="padding-left: 10px;">Edit Satuan</h4>
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
                                <label class="col-form-label" for="nama_satuan">Nama Satuan</label>
                                <input type="text" class="form-control @error ('nama_satuan') is-invalid @enderror" placeholder="Masukkan Satuan" name="nama_satuan" value="{{old('nama_satuan')}}" id="nama_satuan" autofocus>
                                @error('nama_satuan')<div class="invalid-feedback"> {{$message}} </div>@enderror
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