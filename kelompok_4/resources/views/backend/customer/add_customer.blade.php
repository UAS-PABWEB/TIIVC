@extends('backend.layouts.master')

@section('content')
<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Pelanggan</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form" action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data"
                novalidate>
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <a href="{{ avatar() }}" class="img-preview" data-toggle="lightbox" data-title="Foto Pelanggan"
                            data-gallery="gallery">
                            <img src="{{ avatar() }}" class="img-fluid mb-2 img-preview" alt="customer image" width="150" />
                        </a>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">Foto</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" name="foto_pelanggan">
                                <label class="custom-file-label" for="file">Pilih foto pelanggan</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                        @error('foto_pelanggan')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Nama pelanggan"
                            name="nama_pelanggan" value="{{ old('nama_pelanggan') }}">
                        @error('nama_pelanggan')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">No. HP</label>
                        <input type="text" class="form-control" id="exampleInputPassword1"
                            placeholder="Nomor HP pelanggan" name="nomor_hp" value="{{ old('nomor_hp') }}">
                        @error('nomor_hp')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Email</label>
                        <input type="email" class="form-control" id="exampleInputPassword1"
                            placeholder="Email pelanggan" name="email_pelanggan" value="{{ old('email_pelanggan') }}">
                        @error('email_pelanggan')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea class="form-control" rows="3" placeholder="Alamat pelanggan"
                            name="alamat_pelanggan">{{ old('alamat_pelanggan') }}</textarea>
                        @error('alamat_pelanggan')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <a href="{{ URL::previous() }}" type="button" class="btn btn-default">Batal</a>
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
<!-- Ekko Lightbox -->
<script src="{{ asset('backend/plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>
@endsection

@section('page_script')
<script type="text/javascript">
    $(document).ready(function () {
        bsCustomFileInput.init();
    });

</script>
@endsection
