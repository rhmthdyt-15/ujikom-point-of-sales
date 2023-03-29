@extends('layouts.master')

@section('title')
Daftar Penjualan
@endsection

@push('css')
<style>
    .d-flex {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .btn {
        margin-right: 10px;
    }
</style>
@endpush

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>Data Penjualan</strong>
        </div>
        <div class="card-body">

            @if(Session::has('success'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-3">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="table mt-3">
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th width="5%">No</th>
                                <th width="15%">Tanggal</th>
                                <th>Kode Member</th>
                                <th>Total Item</th>
                                <th>Total Harga</th>
                                <th>Diskon</th>
                                <th>Total Bayar</th>
                                <th>Kasir</th>
                                <th width="15%"><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                          @forelse ($penjualan as $key => $row)
                            <tr>
                              <td>{{ $key+1 }}</td>
                              <td width="15%">{{  tanggal_indonesia($row->created_at, false) }}</td>
                              <td>
                                <span class="btn btn-sm btn-success">
                                    {{ $row->member ? $row->member->kode_member : '' }}
                                </span>
                            </td>
                              <td>{{ $row->total_item }}</td>
                              <td>Rp.{{ format_uang($row->total_harga) }}</td>
                              <td>{{ $row->diskon }}</td>
                              <td>Rp.{{ format_uang($row->bayar)  }}</td>
                              <td>{{ $row->user->name}}</td>
                              <td wiidth="15%">
                                <div class="d-flex">
                                    <button type="button" class="btn btn-outline-primary mb-1" data-toggle="modal" data-target="#modal-detail">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                    @includeIf('pages.penjualan.detail', ['penjualan' => $row])
                                
                                    <form method="POST" action="{{ route('penjualan.destroy', $row->id_penjualan) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger ms-1 show_confirm" data-toggle="tooltip" title='Delete'>
                                            <i class="fa fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                </div>                                
                              </td>
                            </tr>
                          @empty                 
                          @endforelse
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script type="text/javascript">
 
    $('.show_confirm').click(function(event) {
         var form =  $(this).closest("form");
         event.preventDefault();
         swal.fire({
           title: 'Are you sure?',
           text: "You won't be able to revert this!",
           icon: 'warning',
           showCancelButton: true,
           confirmButtonColor: '#3085d6',
           cancelButtonColor: '#d33',
           confirmButtonText: 'Yes, delete it!'
         })
         .then((result) => {
           if (result.isConfirmed) {
               form.submit();
               Swal.fire(
               'Deleted!',
               'Your data has been deleted.',
               'success'
               )
           }
       });
    });
 
    
    $(document).ready(function() {
        $("#check_all").click(function() {
            $(".checkBoxClass").prop('checked', $(this).prop('checked'));
        });

        $('#form-delete-multiple').submit(function(event) {
            event.preventDefault();
            var selected = [];
            $('input[type=checkbox][name="ids[]"]:checked').each(function() {
                selected.push($(this).val());
            });

            if (selected.length > 0) {
                swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Anda akan menghapus produk yang dipilih!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then(function(result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('produk.delete_multiple') }}',
                            type: 'DELETE',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                ids: selected
                            },
                            success: function(data) {
                                location.reload();
                            },
                            error: function(data) {
                                console.log('Error:', data);
                            }
                        });
                    }
                });
            } else {
                swal.fire({
                    title: 'Tidak Ada Produk yang Dipilih',
                    text: "Silakan pilih produk yang ingin dihapus!",
                    icon: 'warning',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
</script>  
@endpush
@endsection