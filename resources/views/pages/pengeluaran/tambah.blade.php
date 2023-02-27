<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('pengeluaran.store') }}" method="post" class="form-horizontal">
            @csrf
            @method('post')


            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="mediumModalLabel">Tambah Pengeluaran</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="deskripsi" class="control-label mb-1">Deskripsi</label>
                        <input id="deskripsi" name="deskripsi" type="text" class="form-control" required
                            autofocus>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="form-group">
                         <label for="nominal" class="control-label mb-1">Nominal</label>
                         <input id="nominal" name="nominal" type="number" class="form-control" required
                             autofocus>
                         <span class="help-block with-errors"></span>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-sm btn-flat btn-primary" id="submitForm">
                        Simpan
                    </button>
                    <button type="button" class="btn btn-sm btn-flat btn-warning" data-dismiss="modal">
                        Batal
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>