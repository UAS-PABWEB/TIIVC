@extends('backend.layouts.auth_master')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>CATUT</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Dear, {{ $user->name }}. Untuk reset password Anda silahkan klik <a
                    href="{{ route('backend.reset_password_form', encrypt($user->email)) }}">link ini</a>.</p>
            <p class="login-box-msg">Kode verifikasi: <b>{{ $token }}</b></p>
            <p class="login-box-msg">Abaikan jika Anda tidak hendak mengubah password.</p>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>
@endsection
