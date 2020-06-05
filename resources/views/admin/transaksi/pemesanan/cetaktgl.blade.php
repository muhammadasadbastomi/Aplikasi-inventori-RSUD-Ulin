<div class="modal fade" id="tglModal" tabindex="-1" role="dialog" aria-labelledby="edit-modal-label" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="edit-modal-label" style="padding-left: 10px;">Cetak Berdasarkan Tanggal Pemesanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="get" action="{{route('cetaktglPemesanan')}}" target="_blank">
                    {{ method_field('put') }}
                    @csrf
                    <div class=" modal-body">
                        <div class="form-group">
                            <label for="start">Dari Tanggal</label>
                            <input type="date" class="form-control" name="start" id="start">
                        </div>
                        <div class="form-group">
                            <label for="end">Sampai Tanggal</label>
                            <input type="date" class="form-control" name="end" id="end">
                        </div>
                    </div>
                    <div class="edit modal-footer">
                        <button type="button" class="btn btn-secondary text-white" data-dismiss="modal">Batal</button>
                        <button type="submit" class="edit btn btn-primary"> <i class="feather icon-printer"></i> Cetak</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>