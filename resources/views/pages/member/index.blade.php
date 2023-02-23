@extends('layouts.master')

@section('title')
Member
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>Data Member</strong>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
               <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#largeModal">
                    <i class="fa fa-plus-circle"></i> Tambah</button>
                </button>
                @includeIf('pages.member.tambah')
                
                <form action="{{ route('member.delete_multiple') }}" method="POST" id="form-delete-multiple">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger mb-1 mx-1" id="btn-delete-multiple">
                        <i class="fa fa-trash"></i> Hapus
                    </button>
                </form>
                
                {{-- <button onclick="cetakBarcode('{{ route('member.cetak_barcode') }}')" type="button" class="btn btn-primary mb-1">
                    <i class="fa fa-barcode"></i> Cetak Member
                </button> --}}

                <form class="ml-auto" action="{{ route('member.index') }}" method="GET">
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
               <form action="#" class="form-member">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th>
                                   <input type="checkbox" id="check_all">
                              </th>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Telepon</th>
                                <th>Alamat</th>
                                <th><i class="fa fa-cog"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                             @forelse ($member as $key => $row)
                             <tr>
                                 <td>
                                   <input type="checkbox" name="ids[]" class="checkBoxClass" value="{{ $row->id_member }}">       
                                 </td>                                 
                                 <td >{{ $key + 1 }}</td>
                                 <td >
                                     <span class="btn btn-sm btn-success">
                                         {{ $row->kode_member }}
                                     </span> 
                                 </td>
                                 <td >{{ $row->nama }}</td>
                                 <td >{{ $row->alamat }}</td>
                                 <td >{{ $row->telepon }}</td>
                                 <td>
                                     <div class="d-flex">
                                         <button type="button" class="btn btn-warning mb-1" data-toggle="modal"
                                             data-target="#largeModal-{{ $row->id_member }}">
                                             <i class="fa fa-solid fa-pencil text-white"></i></button>
                                         </button>
                                         @includeIf('pages.member.edit', ['member' => $row])
         
                                         <form method="POST" action="{{ route('member.destroy', $row->id_member) }}">
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
                    <div class="pagination w-full flex justify-end">
                        {{ $member->links('pagination::bootstrap-4') }}
                    </div>
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

    //multiple
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
                    text: "Anda akan menghapus member yang dipilih!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!'
                }).then(function(result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('member.delete_multiple') }}',
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
                    title: 'Tidak Ada member yang Dipilih',
                    text: "Silakan pilih member yang ingin dihapus!",
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