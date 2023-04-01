@extends('layouts.master')

@section('title')
Profil
@endsection

@section('content')
<div class="col-md-12">
    <div class="card">
        <div class="card-body">
            @if(Session::has('success'))
            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show mt-3">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            <div class="mx-auto d-block mt-3">
                <img class="rounded-circle mx-auto d-block" style="width:250px; height:250px;" src="{{ url(auth()->user()->foto ?? '') }}" alt="Card image cap">
                <h5 class="text-sm-center mt-4 mb-1">{{ $profil->name }}</h5>
                <div class="location text-sm-center">{{ $profil->role }}</div>
            </div>
            <hr>
            <div class="card-text text-sm-left">
                <div class="row form-group">
                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Nama</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="disabled-input" value="{{ $profil->name }}" disabled="" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Email</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="disabled-input" value="{{ $profil->email }}" disabled="" class="form-control"></div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Role</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="disabled-input" value="{{ $profil->role }}" disabled="" class="form-control"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


