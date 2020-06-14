@extends('backend.layouts.auth_master')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>CATUT</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Log in untuk memulai sesi</p>

            <form action="{{ route('backend.authenticate') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                        value="{{ old('email') }}" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @if (session('wrong_password'))
                    <p class="text-danger">{{ session('wrong_password') }}</p>
                @endif
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Ingat Saya
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            @include('backend.layouts.social_auth_links')

            <p class="mb-1">
                <a href="{{ route('backend.forgot_password_form') }}">Lupa password</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('backend.register_form') }}" class="text-center">Register</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
