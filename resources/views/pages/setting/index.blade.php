@extends('layouts.master')

@section('title')
Setting Toko
@endsection

@push('css')

@endpush

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <strong>Setting Toko</strong>
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
            <form action="{{ route('setting.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="nama_perusahaan" class=" form-control-label">Nama Perusahaan</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="text" id="nama_perusahaan" name="nama_perusahaan"
                            value="{{ $setting->nama_perusahaan }}" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="telepon" class=" form-control-label">Telepon</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="text" id="telepon" name="telepon" value="{{ $setting->telepon }}"
                            class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="alamat" class=" form-control-label">Alamat</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="text" id="alamat" name="alamat" value="{{ $setting->alamat }}"
                            class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="diskon" class=" form-control-label">Diskon</label>
                    </div>
                    <div class="col-12 col-md-7">
                        <input type="text" id="diskon" name="diskon" value="{{ $setting->diskon }}"
                            class="form-control">
                    </div>
                </div>
                <div class="box-footer text-right">
                    <button class="btn btn-sm btn-flat btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </form>


        </div>
    </div>
</div>
@endsection