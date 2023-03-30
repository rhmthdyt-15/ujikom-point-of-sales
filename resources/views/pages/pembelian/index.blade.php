@extends('layouts.master')

@section('title')
Daftar Pembelian
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>Daftar Pembelian</strong>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <button type="button" class="btn btn-success mr-1" data-toggle="modal" data-target="#largeModal">
                    <i class="fa fa-plus-circle"></i> Transaksi Baru</button>
                @includeIf('pages.pembelian.supplier')
                @empty(! session('id_pembelian'))
                <a href="{{ route('pembelian_detail.index') }}" class="btn btn-info btn-xs btn-flat"><i class="fa fa-pencil"></i> Transaksi Aktif</a>
                @endempty
            </div>
        
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
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th>Total Item</th>
                            <th>Total Harga</th>
                            <th>Diskon</th>
                            <th>Total Bayar</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pembelian as $key => $row)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td >{{  tanggal_indonesia($row->created_at, false) }}</td>
                            <td >{{ $row->supplier->nama }}</td>
                            <td >{{ $row->total_item }}</td>
                            <td>Rp. {{ format_uang($row->total_harga) }}</td>
                            <td>{{ $row->diskon }}%</td>
                            <td>Rp. {{ format_uang($row->bayar)}}</td>
                            <td width="15%">
                                <div class="d-flex">
                                    <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                                        data-target="#modal-detail-{{ $row->id_pembelian }}">
                                        <i class="fa fa-eye text-white"></i></button>
                                    </button>
                                    @includeIf('pages.pembelian.detail')
    
                                    <form method="POST" action="{{ route('pembelian.destroy', $row->id_pembelian) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger ms-1 show_confirm" data-toggle="tooltip" title='Delete' style="margin-left: 5px">
                                            <i class="fa fa-solid fa-trash text-white"></i>
                                        </button>
                                    </form>     
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center">Data Masih Kosong!</td>
                        </tr>
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
      $('#bootstrap-data-table-export').DataTable();
    } );
</script>    
@endpush
@endsection