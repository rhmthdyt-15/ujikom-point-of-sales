@extends('layouts.master')

@section('title')
Transaksi Pembelian
@endsection

@push('css')
<style>
    .tampil-bayar {
        font-size: 4em;
        text-align: center;
        height: 120px;
        background-color: #f8f9fa;
        border: 2px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
    }

    .tampil-terbilang {
        padding: 10px;
        background-color: #fff;
        border: 2px solid #ccc;
        border-radius: 5px;
        box-shadow: 2px 2px 5px rgba(0,0,0,0.2);
        margin-bottom: 20px;
    }

    .table-pembelian tbody tr:last-child {
        display: none;
    }

    @media(max-width: 768px) {
        .tampil-bayar {
            font-size: 2.5em;
            height: 90px;
        }
    }
</style>
@endpush

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

            <div class="table mt-3">
                <form class="form-produk" action="{{ route('pembelian_detail.store') }}" method="POST">
                    @csrf
                    <div class="form-group row">
                        <label for="kode_produk" class="col-lg-2">Kode Produk</label>
                        <div class="col-lg-5">
                            <div class="input-group">
                                <input type="hidden" name="id_pembelian" id="id_pembelian" value="{{ $id_pembelian }}">
                                <input type="hidden" name="id_produk" id="id_produk">
                                <input type="text" class="form-control" name="kode_produk" id="kode_produk">
                                <span class="input-group-btn">
                                    <button class="btn btn-info btn-flat" type="button" data-toggle="modal"
                                        data-target="#largeModal">
                                        <i class="fa fa-arrow-right"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
                @includeIf('pages.pembelian_detail.produk')


                <table id="bootstrap-data-table" class="table table-striped table-bordered table-product">
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
                        @forelse ($pembelianDetail as $key => $row)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>
                                <span class="btn btn-sm btn-success">
                                    {{ $row->produk->kode_produk }}
                                </span>
                            </td>
                            <td>{{ $row->produk->nama_produk }}</td>
                            <td>Rp. {{ format_uang($row->harga_beli) }}</td>
                            <td>
                                <input type="number" class="form-control input-sm quantity"
                                    data-id="{{ $row->id_pembelian_detail }}" data-price="{{ $row->harga_beli }}" value="{{ $row->jumlah }}">
                            </td>
                            <td data-sub-total="{{ $row->subtotal }}">Rp. {{ format_uang($row->subtotal) }}</td>
                            <td>
                                <div class="d-flex">
                                    <form method="POST"
                                        action="{{ route('pembelian_detail.destroy', $row->id_pembelian_detail) }}">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger ms-1 show_confirm"
                                            data-toggle="tooltip" title='Delete' style="margin-left: 5px">
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

                <div class="row">
                    <div class="col-lg-8">
                        <div class="tampil-bayar bg-primary"></div>
                        <div class="tampil-terbilang"></div>
                    </div>
                    <div class="col-lg-4">
                        <form action="{{ route('pembelian.store') }}" class="form-pembelian" method="post">
                            @csrf
                            <input type="hidden" name="id_pembelian" value="{{ $id_pembelian }}">
                            <input type="hidden" name="total" id="total">
                            <input type="hidden" name="total_item" id="total_item">
                            <input type="hidden" name="bayar" id="bayar">

                            <div class="form-group row">
                                <label for="totalrp" class="col-lg-3 control-label">Total</label>
                                <div class="col-lg-8 sub-total-summary">
                                    <input type="text" id="totalrp" class="form-control"  value="Rp. {{ format_uang($pembelianDetail->sum('subtotal')) }}" readonly>
                                    {{-- Rp. {{ format_uang($pembelianDetail->sum('subtotal')) }} --}}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="diskon" class="col-lg-3 control-label"  style="font-size: 15px;">Diskon</label>
                                <div class="col-lg-8">
                                    <input type="number" name="diskon" id="diskon" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="bayar" class="col-lg-3 control-label">Bayar</label>
                                <div class="col-lg-8">
                                    <input type="text" id="bayarrp" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary btn-sm btn-flat pull-right btn-simpan"><i
                            class="fa fa-floppy-o"></i>  Simpan Transaksi</button>
                            {{-- <i class="fa-regular fa-floppy-disk"></i> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')


<script type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    })
    .on('draw.dt', function () {
        loadForm($('#diskon').val());
    });

    //untuk menambah jumlah
    $(document).on('input', '.quantity', function () {
        let id = $(this).data('id');
        let jumlah = parseInt($(this).val());

        let parent = $(this).parent();
        let harga = parseInt($(this).data('price'));

        if (jumlah < 1) {
            $(this).val(1);
            alert('Jumlah tidak boleh kurang dari 1');
            return;
        }
        if (jumlah > 10000) {
            $(this).val(10000);
            alert('Jumlah tidak boleh lebih dari 10000');
            return;
        }

        $.post(`{{ url('/pembelian_detail') }}/${id}`, {
                '_token': $('[name=csrf-token]').attr('content'),
                '_method': 'put',
                'jumlah': jumlah
            })
            .done(response => {
                $(this).on('mouseout', function () {
                    table.ajax.reload(() => loadForm($('#diskon').val()));
                });

                
                var subTotal = parent.next();
                var price = parent.prev();
                var newSubTotal = harga * jumlah;
                
                subTotal.html('Rp. ' + newSubTotal.toLocaleString('id-ID'))
                subTotal.attr('data-sub-total', newSubTotal)
                hitungTotal();

            })
            .fail(errors => {
                alert('Tidak dapat menyimpan data');
                return;
            });
    })

    function hitungTotal() {
        var total = 0;
        $('.table-product').children('tbody').children('tr').each(function() {
            var tr = $(this);
            var subTotal = parseInt(tr.children('td').eq(5).attr('data-sub-total'));
            total += subTotal;
        });

        $('.sub-total-summary').html('Rp. ' + total.toLocaleString('id-ID'));

        return total;
    }

    $(document).on('input', '#diskon', function () {
        if ($(this).val() == "") {
            $(this).val(0).select();
        }
        loadForm($(this).val());
        });
        $('.btn-simpan').on('click', function () {
        $('.form-pembelian').submit();
    });

    $('.btn-simpan').on('click', function () {
        $('.form-pembelian').submit();
    });

    function pilihProduk(id, kode) {
        console.log('masuk')
        $('#id_produk').val(id);
        $('#kode_produk').val(kode);
        tambahProduk();
        // hideProduk();
    }

    function hideProduk() {
        $('#largeModal').modal('hide');
    }

    function tambahProduk() {
        $.ajax({
            type: 'POST',
            url: '{{ route('pembelian_detail.store') }}',
            data: $('.form-produk').serialize(),
            success: function (response) {
                $('#kode_produk').focus();
                window.location.reload()
            },
            error: function (errors) {
                alert('Tidak dapat menyimpan data');
                return;
            }
        });
    }

    function loadForm(diskon = 0) {
        $('#total').val($('.total').text());
        $('#total_item').val($('.total_item').text());
        $.get(`{{ url('/pembelian_detail/loadform') }}/${diskon}/${hitungTotal()}`)
            .done(response => {
                $('#totalrp').val('Rp. '+ response.totalrp);
                $('#bayarrp').val('Rp. '+ response.bayarrp);
                $('#bayar').val(response.bayar);
                $('.tampil-bayar').text('Rp. '+ response.bayarrp);
                $('.tampil-terbilang').text(response.terbilang);
            })
            .fail(errors => {
                alert('Tidak dapat menampilkan data');
                return;
            })
    }

    $('.show_confirm').click(function (event) {
        var form = $(this).closest("form");
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