@extends('backend.layouts.auth_master')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>CATUT</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Email untuk reset password telah dikirim ke <b>{{ $email }}</b>.</p>

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
