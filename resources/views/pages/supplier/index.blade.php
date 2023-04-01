@extends('layouts.master')

@section('title')
Supplier
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>Data Supplier</strong>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <button type="button" class="btn btn-outline-success mr-1" data-toggle="modal" data-target="#largeModal">
                    <i class="fa fa-plus-circle"></i> Tambah</button>
                @includeIf('pages.supplier.tambah')
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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th><i class="fa fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($supplier as $key => $row)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td >{{ $row->nama }}</td>
                            <td >{{ $row->alamat }}</td>
                            <td >{{ $row->telepon }}</td>
                            <td>
                                <div class="d-flex">
                                    <button type="button" class="btn btn-outline-warning mb-1" data-toggle="modal"
                                        data-target="#largeModal-{{ $row->id_supplier }}">
                                        <i class="fa fa-solid fa-pencil"></i></button>
                                    </button>
                                    @includeIf('pages.supplier.edit', ['supplier' => $row])
    
                                    <form method="POST" action="{{ route('supplier.destroy', $row->id_supplier) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-outline-danger ms-1 show_confirm" data-toggle="tooltip" title='Delete' style="margin-left: 5px">
                                            <i class="fa fa-solid fa-trash"></i>
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
                    {{ $supplier->links('pagination::bootstrap-4') }}
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