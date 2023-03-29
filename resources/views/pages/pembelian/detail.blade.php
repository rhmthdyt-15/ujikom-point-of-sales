<div class="modal fade" id="largeModal-{{ $row->id_pembelian }}" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="mediumModalLabel">Detail Produk</h5>
            </div>
            <div class="modal-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama Produk</th>
                            <th>Harga Beli</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detail as $key => $value)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td><span class="label label-success">{{ $value->produk->kode_produk }}</span></td>
                            <td>{{ $value->produk->nama_produk }}</td>
                            <td>Rp. {{ format_uang($value->harga_beli) }}</td>
                            <td>{{ format_uang($value->jumlah) }}</td>
                            <td>Rp. {{ format_uang($value->subtotal) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
    $(document).ready(function() {
      $('#bootstrap-data-table-export').DataTable();
    } );
</script>
@endpush
