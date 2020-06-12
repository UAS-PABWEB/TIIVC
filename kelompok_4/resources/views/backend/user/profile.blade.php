@extends('backend.layouts.master')

@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Profil</h3>
            </div>
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="{{ avatar($user->image) }}"
                        alt="User profile picture" width="50">
                </div>

                <h3 class="profile-username text-center">{{ $user->name }}</h3>

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>No. HP</b> <a class="float-right">{{ $user->phone }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $user->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Alamat</b> <a class="float-right">{{ $user->address }}</a>
                    </li>
                </ul>

                <a href="{{ route('user.edit', $user) }}" class="btn btn-primary btn-block"><b>Edit</b></a>
                <a href="{{ route('user.change_password_form') }}" class="btn btn-warning btn-block"><b>Ubah
                        Password</b></a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>
<!-- /.row -->
@endsection
