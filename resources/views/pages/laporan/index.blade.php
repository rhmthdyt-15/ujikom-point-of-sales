@extends('layouts.master')

@section('title')
Laporan Pendapatan
@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
@endpush

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong> Laporan Pendapatan {{ tanggal_indonesia($tanggalAwal, false) }} s/d {{ tanggal_indonesia($tanggalAkhir, false) }}</strong>
        </div>
        <div class="card-body">
            <div class="d-flex align-items-center mb-3">
                <button class="btn btn-info btn-xs btn-flat mx-2" data-toggle="modal"
                data-target="#modal-form">
                    <i class="fa fa-plus-circle"></i> Ubah Periode</button>
                @includeIf('pages.laporan.form')
                <a href="{{ route('laporan.export_pdf', [$tanggalAwal, $tanggalAkhir]) }}" target="_blank" class="btn btn-success btn-xs btn-flat"><i class="fa fa-file-excel-o"></i> Export PDF</a>
            </div>

            <div class="table mt-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th width="5%">No</th>
                            <th>Tanggal</th>
                            <th>Penjualan</th>
                            <th>Pembelian</th>
                            <th>Pengeluaran</th>
                            <th>Pendapatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total_pendapatan = 0; @endphp
                        @foreach($data as $key => $row)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $row['tanggal'] }}</td>
                            <td>{{ $row['penjualan'] }}</td>
                            <td>{{ $row['pembelian'] }}</td>
                            <td>{{ $row['pengeluaran'] }}</td>
                            <td>{{ $row['pendapatan'] }}</td>
                            @php $total_pendapatan += str_replace('.', '', $row['pendapatan']); @endphp
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.id.min.js"></script>

<script>
     $(document).ready(function() {
        $('.datepicker').datepicker({
            format: 'yyyy-mm-dd',
            language: 'id',
            autoclose: true
        });
    });
</script>
@endpush
@endsection