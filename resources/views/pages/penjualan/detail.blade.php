<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="modal-detail">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Penjualan</h4>
            </div>
            <div class="modal-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered table-detail">
                    <thead>
                        <th width="5%">No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        @foreach($detail as $key => $row )
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <span class="btn btn-sm btn-success">
                                    {{ $row->produk->kode_produk }}
                                </span>
                            </td>
                            <td>{{ $row->produk->nama_produk }}</td>
                            <td>Rp.{{ format_uang($row->harga_jual) }}</td>
                            <td>Rp.{{ format_uang($row->jumlah) }}</td>
                            <td>Rp.{{ format_uang($row->subtotal) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>