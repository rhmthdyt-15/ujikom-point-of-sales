<div class="modal fade" id="modal-detail-{{ $id_pembelian }}" tabindex="-1" role="dialog" aria-labelledby="modal-detail">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                        <h5 class="modal-title" id="modal-detail-{{ $id_pembelian }}-label">Detail Pembelian</h5>
                {{-- <h4 class="modal-title">Detail Pembelian</h4> --}}
            </div>
            <div class="modal-body">
                <?php
                    $detail = \App\Models\PembelianDetail::with('produk')
                        ->where('id_pembelian', $id_pembelian)
                        ->get();
                ?>
                <table class="table table-striped table-bordered table-detail">
                    <thead>
                        <th width="5%">No</th>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </thead>
                    <tbody>
                        @foreach ($detail as $key => $row )        
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <span class="btn btn-sm btn-success">
                                    {{ $row->produk->kode_produk }}
                                </span>
                            </td>
                            <td>{{ $row->produk->nama_produk }}</td>
                            <td>Rp.{{ format_uang($row->harga_beli)  }}</td>
                            <td>{{ $row->jumlah }}</td>
                            <td>Rp.{{ format_uang($row->subtotal) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
