@extends('master')
@section('title')Order @endsection
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
                                        href="{{ url('/admin/colors/list') }}">Order</a>
                                </li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-danger p-1">
                        <div class="card-header">
                            <h3 class="card-title">List Orders</h3>
                           
                        </div>
                        
                    </div>
                    <table id="myTable" class="table table-striped ">
                        <thead>
                            <tr>
                                <th>Sr.no</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Total Quantity</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        @foreach ($orders_master as $order )
                        <tbody>
                           
                              <tr>
                                    <td>{{ $order->order_id}}</td>
                                    <td>{{ $order->first_name }}</td>
                                    <td>{{ $order->last_name }}</td>
                                    <td>{{ $order->total_quantity }}</td>
                                    <td>{{ $order->order_status }}</td>
                                    <td>
                                        <a href="{{ url('/admin/orders/edit',$order->order_id ) }}" class=""><i
                                            class="fas fa-pencil-alt"></i></a>&nbsp;
                                        <a href="{{ url('/admin/orders/invoice',$order->order_id) }}" class=""><i
                                                class="fas fa-eye"></i></a>&nbsp;
                                        
                                    </td>
                                </tr>
                            
                        </tbody>
                    @endforeach
                    </table>
                </div>
            </div>
        @endsection
        @section('scripts')
            <script>
                $(document).ready(function() {
                    $('#myTable').DataTable();
                });
              
            </script>

        @endsection
