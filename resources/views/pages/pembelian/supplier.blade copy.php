<div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="mediumModalLabel">Pilih Supplier</h5>
            </div>
            <div class="modal-body">
                {{-- <div class="d-flex align-items-center mb-3">
                    <strong>Data Supplier</strong>
                    <form class="ml-auto" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search_supplier" placeholder="Search" value="{{ $searchSupplier }}">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div> --}}
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Telepon</th>
                            <th>Alamat</th>
                            <th><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody id="supplier-table">
                        @foreach ($supplier as $index => $item )
                            <tr>
                                <td>{{ ($supplier->currentPage() - 1) * $supplier->perPage() + $loop->iteration }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->telepon }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <button class="btn btn-outline-primary btn-xs btn-flat">
                                        <i class="fa fa-check-circle"></i>
                                        Pilih
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div class="pagination w-full flex justify-end">
                    {{ $supplier->appends(['search_supplier' => $searchSupplier])->links('pagination::bootstrap-4') }}
                </div> --}}
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

<script>
$(document).ready(function() {
    // Mengambil data supplier dengan AJAX
    function getSupplier(url) {
        $.ajax({
            url: url,
            success: function(data) {
                $('#supplier-table').html(data);
            },
            error: function() {
                alert('Data tidak dapat dimuat.');
            }
        });
    }

    // Mematikan reload page saat pagination diklik
    $(document).on('click', '#supplier-table .pagination a', function(e){
        e.preventDefault(); 
        var url = $(this).attr('href');
        getSupplier(url);
    });
});
</script>
