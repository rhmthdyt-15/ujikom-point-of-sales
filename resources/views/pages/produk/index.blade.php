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
            <div class="d-flex">
                <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#largeModal">
                    <i class="fa fa-plus-circle"></i> Tambah</button>
                </button>
                @includeIf('pages.produk.tambah')
    
                <form action="{{ route('produk.delete_multiple') }}" method="POST" id="form-delete-multiple">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger mb-1 mx-1" id="btn-delete-multiple">
                        <i class="fa fa-trash"></i> Hapus
                    </button>
                </form>
                
                <button onclick="cetakBarcode('{{ route('produk.cetak_barcode') }}')" type="button" class="btn btn-primary mb-1">
                    <i class="fa fa-barcode"></i> Cetak Barcode
                </button>
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
                <form action='{{ route('produk.cetak_barcode') }}' method="post" class="form-produk">
                    @csrf
                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" id="check_all">
                                </th>
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
                            @forelse ($produk as $key => $row)
                            <tr>
                                <td>
                                    <input type="checkbox" name="ids[]" class="checkBoxClass" value="{{ $row->id_produk }}">
                                </td>
                                <td >{{ $key + 1 }}</td>
                                <td >
                                    <span class="btn btn-sm btn-success">
                                        {{ $row->kode_produk }}
                                    </span> 
                                </td>
                                <td >{{ $row->nama_produk }}</td>
                                <td >{{ $row->nama_kategori }}</td>
                                <td >{{ $row->merk }}</td>
                                <td >{{ $row->harga_jual }}</td>
                                <td >{{ $row->harga_beli }}</td>
                                <td >{{ $row->diskon }}</td>
                                <td >{{ $row->stok }}</td>
                                <td>
                                    <div class="d-flex">
                                        <button type="button" class="btn btn-warning mb-1" data-toggle="modal"
                                            data-target="#largeModal-{{ $row->id_produk }}">
                                            <i class="fa fa-solid fa-pencil text-white"></i></button>
                                        </button>
                                        @includeIf('pages.produk.edit', ['produk' => $row])
        
                                        <form method="POST" action="{{ route('produk.destroy', $row->id_produk) }}">
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
                </form>
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
 
    // $(document).ready(function() {
    //     $(function() {
    //         $("#check_all").click(function() {
    //             $(".checkBoxClass").prop('checked', $(this).prop('checked'));
    //         });
    //     });
        
    //     $('#form-delete-multiple').submit(function(event) {
    //         event.preventDefault();
    //         var selected = [];
    //         $('input[type=checkbox][name=ids]:checked').each(function() {
    //             selected.push($(this).val());
    //         });
    
    //         if (selected.length > 0) {
    //             swal.fire({
    //                 title: 'Are you sure?',
    //                 text: "You won't be able to revert this!",
    //                 icon: 'warning',
    //                 showCancelButton: true,
    //                 confirmButtonColor: '#3085d6',
    //                 cancelButtonColor: '#d33',
    //                 confirmButtonText: 'Yes, delete it!'
    //             }).then(function(result) {
    //                 if (result.isConfirmed) {
    //                     $.ajax({
    //                         url: '{{ route('produk.delete_multiple') }}',
    //                         type: 'DELETE',
    //                         headers: {
    //                             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                         },
    //                         data: {
    //                             ids: selected
    //                         },
    //                         success: function(response) {
    //                             swal.fire({
    //                                 title: 'Deleted!',
    //                                 text: 'Your data has been deleted.',
    //                                 icon: 'success'
    //                             }).then(function() {
    //                                 location.reload();
    //                             });
    //                         },
    //                         error: function(xhr) {
    //                             swal.fire({
    //                                 title: 'Oops...',
    //                                 text: xhr.statusText,
    //                                 icon: 'error'
    //                             });
    //                         }
    //                     });
    //                 }
    //             });
    //         } else {
    //             swal.fire({
    //                 title: 'Oops...',
    //                 text: 'Please select at least one item to delete.',
    //                 icon: 'error'
    //             });
    //         }
    //     });
    // });

    
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

    //apa

    // function cetakBarcode(url) {
    //     if ($('input:checked').length < 1) {
    //         alert('Pilih data yang akan dicetak');
    //         return;
    //     } else if ($('input:checked').length < 3) {
    //         alert('Pilih minimal 3 data untuk dicetak');
    //         return;
    //     } else {
    //         $('.form-produk')
                // .attr('target', '_blank')
                // .attr('action', url)
                // .submit();

    //         // window.open(url, '_blank')
    //     }
    // }

    function cetakBarcode(url) {
        if ($('input:checked').length < 1) {
            alert('Pilih data yang akan dicetak');
            return;
        } else if ($('input:checked').length < 3) {
            alert('Pilih minimal 3 data untuk dicetak');
            return;
        } else {
            $('.form-produk')
                .attr('target', '_blank')
                .attr('action', url)
                .submit();

        }
    }
</script>  
@endpush
@endsection