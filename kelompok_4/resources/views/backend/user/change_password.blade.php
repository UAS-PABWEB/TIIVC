@extends('backend.layouts.master')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Ubah Password</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('user.change_password') }}" method="POST" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="exampleInputEmail1"
                            placeholder="Password saat ini" name="password">
                        @error('password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password baru <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="exampleInputEmail1" placeholder="Password baru"
                            name="password_baru">
                        @error('password_baru')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ulangi Password baru <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="exampleInputEmail1"
                            placeholder="Ulangi password baru" name="ulangi_password">
                        @error('ulangi_password')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ route('user.show', Auth::id()) }}" type="button" class="btn btn-default">Batal</a>
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
