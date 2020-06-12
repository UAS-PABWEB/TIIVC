@extends('backend.layouts.auth_master')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>CATUT</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Registrasi pengguna baru</p>

            <form action="{{ route('backend.register') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nama lengkap" name="nama"
                        value="{{ old('nama') }}" required autofocus>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                @error('nama')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}"
                        required>
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
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Ulangi password" name="ulangi_password"
                        required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('ulangi_password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="row">
                    <div class="col-8">
                        Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>



            @include('backend.layouts.social_auth_links')
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
@endsection
