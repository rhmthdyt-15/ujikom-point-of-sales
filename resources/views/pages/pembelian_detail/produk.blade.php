<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="mediumModalLabel">Pilih Produk</h5>
            </div>
            <div class="modal-body">
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Produk</th>
                            <th>Nama</th>
                            <th>Harga Beli</th>
                            <th><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody id="supplier-table">
                        @foreach ($produk as $key => $item )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <span class="btn btn-sm btn-success">
                                        {{ $item->kode_produk }}
                                    </span> 
                                </td>
                                <td>{{ $item->nama_produk }}</td>
                                <td>{{ $item->harga_beli }}</td>
                                <td>
                                     <a href="#" class="btn btn-outline-primary btn-xs btn-flat"
                                        onclick="pilihProduk('{{ $item->id_produk }}','{{ $item->kode_produk }}')">
                                        <i class="fa fa-check-circle"></i>
                                        Pilih
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
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
 