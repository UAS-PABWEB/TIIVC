@extends('backend.layouts.auth_master')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>CATUT</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Selangkah lagi untuk memulihkan password Anda, reset password sekarang.</p>

            <form action="{{ route('backend.reset_password') }}" method="post" novalidate>
                @csrf
                <input type="hidden" name="email" value="{{ $passwordReset->email }}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Kode verifikasi" name="kode_verifikasi">
                    <div class="input-group-append">
                        <div class="input-group-text"></div>
                    </div>
                </div>
                @error('kode_verifikasi')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password baru" name="password_baru">
                    <div class="input-group-append">
                        <div class="input-group-text"></div>
                    </div>
                </div>
                @error('password_baru')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Ulangi password" name="ulangi_password">
                    <div class="input-group-append">
                        <div class="input-group-text"></div>
                    </div>
                </div>
                @error('ulangi_password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Ubah password</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mt-3 mb-1">
                <a href="{{ route('login') }}">Login</a>
            </p>
            <p class="mb-0">
                <a href="{{ route('backend.register_form') }}" class="text-center">Register pengguna baru</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
