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

                <form class="ml-auto" action="{{ route('pembelian.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-secondary" type="submit">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
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
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Supplier</th>
                            <th>Total Item</th>
                            <th>Total Harga</th>
                            <th>Diskon</th>
                            <th>Total Bayar</th>
                            <th><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pembelian as $index => $row)
                        <tr>
                            <td>{{ ($pembelian->currentPage() - 1) * $pembelian->perPage() + $loop->iteration }}</td>
                            <td >{{ $row->nama }}</td>
                            <td >{{ $row->alamat }}</td>
                            <td >{{ $row->telepon }}</td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-warning mb-1" data-toggle="modal"
                                        data-target="#largeModal-{{ $row->id_pembelian }}">
                                        <i class="fa fa-solid fa-pencil text-white"></i></button>
                                    </button>
                                    @includeIf('pages.pembelian.edit', ['pembelian' => $row])
    
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
                {{-- <div class="pagination w-full flex justify-end">
                    {{ $pembelian->links('pagination::bootstrap-4') }}
                </div> --}}
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
 
</script>    
@endpush
@endsection