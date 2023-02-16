<div class="modal fade" id="largeModal-{{ $row->id_produk }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <form action="{{ route('produk.update', ['produk' => $produk->id_produk]) }}" method="post" class="form-horizontal">
            @csrf
            @method('put')


            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title" id="mediumModalLabel">Edit Produk <i>{{ $produk->nama_produk }}</i></h5>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama_produk" class="control-label mb-1">Nama Produk</label>
                        <input id="nama_produk" name="nama_produk" type="text" class="form-control" value="{{ $produk->nama_produk }}" required
                            autofocus>
                        <span class="help-block with-errors"></span>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">Kategori</label></div>
                        <div class="col-12 col-md-12">
                              <select name="id_kategori" id="id_kategori" class="form-control" required>
                                   <option value="">Pilih Kategori</option>
                                   @foreach ($kategori as $key => $item)
                                   <option value="{{ $key }}" {{ $produk->id_kategori == $key ? 'selected' : '' }}>{{ $item }}</option>
                                   @endforeach
                              </select>
                            <span class="help-block with-errors"></span>
                        </div>
                    </div>

                     <div class="form-group">
                         <label for="merk" class="control-label mb-1">Merk</label>
                         <input id="merk" name="merk" value="{{ $produk->merk }}" type="text" class="form-control" required
                             autofocus>
                         <span class="help-block with-errors"></span>
                     </div>

                     <div class="form-group">
                         <label for="harga_beli" class="control-label mb-1">Harga Beli</label>
                         <input id="harga_beli" name="harga_beli" value="{{ $produk->harga_beli }}" type="number" class="form-control" required
                             autofocus>
                         <span class="help-block with-errors"></span>
                     </div>

                     <div class="form-group">
                         <label for="harga_jual" class="control-label mb-1">Harga Jual</label>
                         <input id="harga_jual" name="harga_jual" value="{{ $produk->harga_jual }}" type="number" class="form-control" required
                             autofocus>
                         <span class="help-block with-errors"></span>
                     </div>

                     <div class="form-group">
                         <label for="diskon" class="control-label mb-1">Diskon</label>
                         <input id="diskon" name="diskon" value="{{ $produk->diskon }}" type="number" class="form-control" required
                             autofocus>
                         <span class="help-block with-errors"></span>
                     </div>

                     <div class="form-group">
                         <label for="stok" class="control-label mb-1">Stok</label>
                         <input id="stok" name="stok" value="{{ $produk->stok }}" type="number" class="form-control" required
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