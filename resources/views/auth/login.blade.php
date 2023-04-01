@extends('layouts.auth')

@section('login')
<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="{{ url('/') }}">
                    <img class="align-content" src="{{ asset('templates/images/logo3.png') }}" alt="">
                </a>
            </div>
            <div class="login-form">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="form-group has-feedback @error('email') has-error @enderror">
                        <label>Email address</label>
                        <input type="email" name="email" class="form-control" placeholder="Email" required>
                        @error('email')                     
                        <label for="inputError2i" class=" form-control-label">{{ $message }}</label>
                        @enderror
                    </div>
                    <div class="form-group has-feedback @error('password') has-error @enderror">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                        @error('password')                     
                        <label for="inputError2i" class=" form-control-label">{{ $message }}</label>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Sign in</button>
                    <div class="register-link m-t-15 text-center">
                        <p>Don't have account ? <a href="{{ route('register') }}"> Sign Up Here</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection