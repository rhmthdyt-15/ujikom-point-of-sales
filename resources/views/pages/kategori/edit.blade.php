<div class="modal fade" id="largeModal-{{ $row->id_kategori }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('kategori.update', ['kategori' => $kategori->id_kategori]) }}" method="post" class="form-horizontal">
            @csrf
            @method('put')

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="mediumModalLabel">Edit Kategori <i>{{ $kategori->nama_kategori }}</i></h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_kategori" class="control-label mb-1">Kategori</label>
                        <input id="nama_kategori" name="nama_kategori" type="text" class="form-control" value="{{ $kategori->nama_kategori }}" required>
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