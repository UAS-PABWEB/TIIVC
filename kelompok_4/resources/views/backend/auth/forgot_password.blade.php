@extends('backend.layouts.auth_master')

@section('content')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>CATUT</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Lupa password? Masukkan email Anda untuk membuat password baru.</p>

      <form action="{{ route('backend.forgot_password') }}" method="post">
        @csrf
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
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
