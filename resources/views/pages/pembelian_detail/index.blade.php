@extends('layouts.master')

@section('title')
Transaksi Pembelian
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>Transaksi Pembelian</strong>
        </div>
        <div class="card-body">
            <table>
                <tr>
                    <td>Supplier</td>
                    <td>: {{ $supplier->nama }}</td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>: {{ $supplier->telepon }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $supplier->alamat }}</td>
                </tr>
            </table>
            {{-- <div class="d-flex align-items-center mb-3">
                <button type="button" class="btn btn-success mr-1" data-toggle="modal" data-target="#largeModal">
                    <i class="fa fa-plus-circle"></i> Transaksi Baru</button>
                @includeIf('pages.pembelian_detail.produk')
            </div>
        
            @if(Session::has('success'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-3">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif --}}

            <div class="table mt-3">
                <form class="form-produk">
                    @csrf
                    <div class="form-group row">
                        <label for="kode_produk" class="col-lg-2">Kode Produk</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <input type="hidden" name="id_pembelian" id="id_pembelian" value="{{ $id_pembelian }}">
                                <input type="hidden" name="id_produk" id="id_produk">
                                <input type="text" class="form-control" name="kode_produk" id="kode_produk">
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-flat" type="button" data-toggle="modal" data-target="#largeModal">
                                        <i class="fa fa-arrow-right"></i></button>
                                    @includeIf('pages.pembelian_detail.produk')
                                    {{-- <button onclick="tampilProduk()" class="btn btn-info btn-flat" type="button"><i class="fa fa-arrow-right"></i></button> --}}
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th width="15%">Jumlah</th>
                            <th>Subtotal</th>
                            <th width="15%"><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @forelse ($pembelian as $key => $row)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td >{{ $row->tanggal }}</td>
                            <td >{{ $row->supplier }}</td>
                            <td >{{ $row->total_item }}</td>
                            <td>{{ $row->total_harga }}</td>
                            <td>{{ $row->diskon }}</td>
                            <td>{{ $row->bayar }}</td>
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
                        @endforelse --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('scripts')


<script type="text/javascript">

    function pilihProduk(id, kode) {
        $('#id_produk').val(id);
        $('#kode_produk').val(kode);
        hideProduk();
        tambahProduk(); 
    }

    function tambahProduk() {
        $.post('{{ route('pembelian_detail.store') }}', $('.form-produk').serialize())
            .done(response => {
                $('#kode_produk').focus();
            })
            .fail(errors => {
                alert('Tidak Dapat Menyimpan Data')
                return;
            })
    }
 

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