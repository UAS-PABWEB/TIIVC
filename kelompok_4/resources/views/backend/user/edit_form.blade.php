@extends('backend.layouts.master')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Profil</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('user.update', $user) }}" method="POST" enctype="multipart/form-data"
                novalidate>
                @csrf
                @method('put')
                <div class="card-body">
                    <div class="form-group">
                        <img src="{{ avatar($user->image) }}" class="img-fluid mb-2 img-preview" alt="user image"
                            width="150" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="foto">
                                <label class="custom-file-label" for="file">Pilih foto</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error('foto')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama lengkap"
                            name="nama" value="{{ old('nama', $user->name) }}">
                        @error('nama')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No. HP</label>
                        <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nomor HP"
                            name="nomor_hp" value="{{ old('nomor_hp', $user->phone) }}">
                        @error('nomor_hp')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Email"
                            name="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" placeholder="Alamat"
                            name="alamat">{{ old('alamat', $user->address) }}</textarea>
                        @error('alamat')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ route('user.show', $user) }}" type="button" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('script')
<!-- bs-custom-file-input -->
<script src="{{ asset('backend/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
@endsection

@section('page_script')
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

</script>
@endsection
