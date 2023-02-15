<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="#" method="post" class="form-horizontal">
            @csrf
            @method('post')


            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="mediumModalLabel">Tambah Produk</h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_produk" class="control-label mb-1">Nama Produk</label>
                        <input id="nama_produk" name="nama_produk" type="text" class="form-control" required
                            autofocus>
                        <span class="help-block with-errors"></span>
                    </div>
                    <div class="form-group">
                         <label for="id_kategori" class="control-label mb-1">Kategori</label>
                         <div class="col-lg-6">
                              <select name="id_kategori" id="id_kategori" class="form-control" required>
                                  <option value="">Pilih Kategori</option>
                                  @foreach ($kategori as $key => $item)
                                  <option value="{{ $key }}">{{ $item }}</option>
                                  @endforeach
                              </select>
                              <span class="help-block with-errors"></span>
                          </div>
                         <input id="id_kategori" name="id_kategori" type="text" class="form-control" required
                             autofocus>
                         <span class="help-block with-errors"></span>
                     </div>
                     <div class="form-group">
                         <label for="nama_produk" class="control-label mb-1">Merk</label>
                         <input id="nama_produk" name="nama_produk" type="text" class="form-control" required
                             autofocus>
                         <span class="help-block with-errors"></span>
                     </div>
                     <div class="form-group">
                         <label for="nama_produk" class="control-label mb-1">Harga Beli</label>
                         <input id="nama_produk" name="nama_produk" type="text" class="form-control" required
                             autofocus>
                         <span class="help-block with-errors"></span>
                     </div>
                     <div class="form-group">
                         <label for="nama_produk" class="control-label mb-1">Harga Jual</label>
                         <input id="nama_produk" name="nama_produk" type="text" class="form-control" required
                             autofocus>
                         <span class="help-block with-errors"></span>
                     </div>
                     <div class="form-group">
                         <label for="nama_produk" class="control-label mb-1">Diskon</label>
                         <input id="nama_produk" name="nama_produk" type="text" class="form-control" required
                             autofocus>
                         <span class="help-block with-errors"></span>
                     </div>
                     <div class="form-group">
                         <label for="nama_produk" class="control-label mb-1">Stok</label>
                         <input id="nama_produk" name="nama_produk" type="text" class="form-control" required
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