@extends('layouts.master')

@section('title')
Produk
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>Data Produk</strong>
        </div>
        <div class="card-body">
            <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#largeModal">
                <i class="fa fa-plus-circle"></i> Tambah</button>
            </button>
            @includeIf('pages.produk.tambah')
            <button type="button" class="btn btn-danger mb-1">
               <i class="fa fa-trash"></i> Hapus</button>
           </button>
           <button type="button" class="btn btn-primary mb-1">
               <i class="fa fa-barcode"></i> Cetak Barcode</button>
           </button>
            {{-- @includeIf('pages.kategori.tambah')
            @if(Session::has('success'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-3">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif --}}

            <div class="table mt-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Merk</th>
                            <th>Harga Beli</th>
                            <th>Harga Jual</th>
                            <th>Diskon</th>
                            <th>Stok</th>
                            <th><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                     
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{-- @push('scripts')
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
@endpush --}}
@endsection