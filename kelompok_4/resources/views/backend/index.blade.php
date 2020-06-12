@extends('backend.layouts.master')

@section('style')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endsection

@section('page-title')
Dashboard
@endsection

@section('content')
<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ count($customers) }}</h3>

                <p>Pelanggan</p>
            </div>
            <div class="icon">
                <i class="ion ion-person"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-6 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ rupiah($totalCustomerDebt) }}</h3>

                <p>Total Utang Pelanggan</p>
            </div>
            <div class="icon">
                <i class="ion ion-cash"></i>
            </div>
        </div>
    </div>
    <!-- ./col -->

    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('customer.create') }}" class="btn btn-block btn-info" style="color:white">Tambah
                    Pelanggan</a>
            </div>
            <div class="card-body">
                <table id="mytable" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Foto</th>
                            <th>Nama Pelanggan</th>
                            <th>Total Utang</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                        <tr>
                            <td>
                                <center>
                                    <a href="{{ avatar($customer->image) }}" data-toggle="lightbox"
                                        data-title="{{ $customer->name }}">
                                        <img src="{{ avatar($customer->image) }}"
                                            class="img-circle elevation-2 img-fluid mb-2" alt="customer image"
                                            width="50" style="background-color: white" />
                                    </a>
                                </center>
                            </td>
                            <td><a href="{{ route('customer.show', $customer) }}">{{ $customer->name }}</a></td>
                            <td style="text-align: right">{{ total_debt($customer) }}</td>
                            <td>
                                <center>
                                    <div class="btn-group">
                                        <a href="{{ route('customer.create_debt', $customer->id) }}"
                                            class="btn btn-default">Tambah
                                            utang</a>
                                        <a href="{{ route('customer.edit', $customer) }}" class="btn btn-default">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-default btn-modal" data-toggle="modal"
                                            data-target="#modal-target"
                                            data-link="{{ route('customer.delete', $customer->id) }}"
                                            data-content="{{ $customer->name }}">
                                            <i class="fas fa-trash"></i></a>
                                        </button>
                                    </div>
                                </center>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Foto</th>
                            <th>Nama Pelanggan</th>
                            <th>Total Utang</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
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
