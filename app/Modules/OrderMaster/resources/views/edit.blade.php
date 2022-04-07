@extends('master')
@section('title')Color @endsection
@section('content')
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active"><a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ url('/admin/colors/list') }}">Color</a>
                                </li>
                                <li class="breadcrumb-item">Edit</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center p-1">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Edit Order</h3>
                            <a href="{{ url('/admin/orders') }}" class="btn btn-danger float-right">
                                <h5><i class="fas fa-arrow-alt-circle-left fa-lg"></i></h5>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" id="form_submit" action="">
                            @csrf
                            {{-- @method('PUT'); --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Order Status</label>

                                    <select class="form-select form-control" aria-label="select" name="order_status" id="order_status">
                                        <option selected>Select Status</option>
                                        <option value="Delivered">Delivered</option>
                                        <option value="pending">Pending</option>
                                        <option value="pending">On the view</option>
                                        <option value="pending">Cancelled</option>
                                    </select>
                                    <h5 id="colorcheck"></h5>

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer " align="center">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
        </div>
    </div>
    </div>
@endsection

