@extends('backend.layouts.master')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <center>
                    Detail Pelanggan
                </center>
            </div>
            <div class="card-body box-profile">
                <div class="text-center">
                    <a href="{{ avatar($customer->image) }}" data-toggle="lightbox" data-title="{{ $customer->name }}">
                        <img src="{{ avatar($customer->image) }}"
                            class="profile-user-img img-circle elevation-2 img-fluid mb-2" alt="user image" width="50"
                            style="background-color: white" />
                    </a>
                </div>

                <h3 class="profile-username text-center">{{ $customer->name }}</h3>

                <p class="text-muted text-center"></p>

                <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                        <b>Total Utang</b> <a class="float-right">{{ total_debt($customer) }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>No. HP</b> <a class="float-right">{{ $customer->phone }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Email</b> <a class="float-right">{{ $customer->email }}</a>
                    </li>
                    <li class="list-group-item">
                        <b>Alamat</b> <a class="float-right">{{ $customer->address }}</a>
                    </li>
                </ul>

                <a href="{{ route('customer.edit', $customer) }}" class="btn btn-primary btn-block"><b>Edit</b></a>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="card">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('customer.create_debt', $customer->id) }}">Tambah
                            Utang</a>
                    </li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                <div class="tab-content">
                    <div class="active tab-pane" id="timeline">
                        <table id="mytable" class="table table-bordered table-hover">
                            <thead>
                                <tr style="text-align: center">
                                    <th>No.</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1;
                                @endphp
                                @foreach ($customerDebts as $debt)
                                <tr style="text-align: center">
                                    <td>{{ $no++ }}</td>
                                    <td style="text-align: right">{{ rupiah($debt->nominal) }}</td>
                                    <td style="text-align: justify">{{ $debt->description }}</td>
                                    <td>{{ tgl_indo($debt->date) }}</td>
                                    <td style="text-align: right">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-default">
                                                {!! debt_status($debt->status) !!}
                                            </button>
                                            <button type="button"
                                                class="btn btn-default dropdown-toggle dropdown-hover dropdown-icon"
                                                data-toggle="dropdown">
                                                <span class="sr-only">Toggle Dropdown</span>
                                                <div class="dropdown-menu" role="menu">
                                                    <a class="dropdown-item change-debt-status text-danger"
                                                        @if ($debt->status != 0)
                                                        data-link="{{ route('debt.change_status', $debt) }}"
                                                        @endif>Belum dibayar</a>
                                                    <a class="dropdown-item change-debt-status text-success"
                                                        @if ($debt->status != 1)
                                                        data-link="{{ route('debt.change_status', $debt) }}"
                                                        @endif>Lunas</a>
                                                </div>
                                            </button>
                                        </div>
                                    </td>
                                    <td>
                                        <center>
                                            <div class="btn-group">
                                                <a href="{{ route('debt.edit', $debt) }}" class="btn btn-default">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <button type="button" class="btn btn-default btn-modal"
                                                    data-toggle="modal" data-target="#modal-target"
                                                    data-link="{{ route('debt.destroy', $debt) }}">
                                                    <i class="fas fa-trash"></i></a>
                                                </button>
                                            </div>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="text-align: center">
                                    <th>No.</th>
                                    <th>Nominal</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->
@include('backend.layouts.modal_danger')
@endsection

@section('script')
<!-- DataTables -->
<script src="{{ asset('backend/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
@endsection

@section('page_script')
<script>
    $(function () {
        $("#mytable").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    });

</script>
@endsection
