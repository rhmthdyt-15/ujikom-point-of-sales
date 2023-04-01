@extends('layouts.master')

@section('title')
    Dashboard
@endsection

@push('css')
    <style>
        .box {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        padding: 30px;
        text-align: center;
    }

    .box h1 {
        font-size: 3rem;
        font-weight: 700;
        color: #000;
    }

    .box h2 {
        font-size: 2rem;
        font-weight: 500;
        color: #555;
    }

    .box img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 30px;
    }

    .btn-success {
        background-color: #28a745;
        color: #fff;
        font-weight: 700;
        border: none;
        border-radius: 5px;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .btn-success:hover {
        background-color: #218838;
    }
</style>
@endpush

@section('content')
<div class="row justify-content-center align-items-center vh-100">
    <div class="col-lg-12 text-center">
        <div class="box">
            <div class="box-body">
                <img src="https://cdn.pixabay.com/photo/2016/03/31/19/57/avatar-1295404_960_720.png" alt="user-avatar" class="img-fluid rounded-circle mb-4">
                <h1 class="mb-3">Selamat Datang</h1>
                <h2 class="mb-4">Anda login sebagai KASIR</h2>
                <a href="{{ route('transaksi.baru') }}" class="btn btn-success btn-lg">Transaksi Baru</a>
            </div>
        </div>
    </div>
</div>
@endsection