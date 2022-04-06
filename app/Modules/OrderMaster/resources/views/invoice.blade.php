@extends('master')
@section('title')Order @endsection
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/admin/dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">order</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> BIKE NATION

                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    @php
                                        $b_address_data = getBillingAddress($address->billing_id);

                                    @endphp
                                   <b> Billing Address</b>
                                   @foreach ($b_address_data as $billing)
                                    <address>
                                       {{$billing->first_name }} <br>
                                        {{$billing->address}}<br>
                                        Pincode {{$billing->pincode}} <br>
                                        Phone: {{$billing->phone_number}}<br>
                                        Email:{{$billing->email}}
                                    </address>
                                    @endforeach
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    @php
                                    $s_address_data = getShippingAddress($address->shipping_id);
                                @endphp
                                   <b> Shipping Address</b>
                                   @foreach ($s_address_data as $billing)
                                   <address>
                                      {{$billing->first_name }} {{$billing->last_name}}<br>
                                       {{$billing->address}}<br>
                                       Pincode {{$billing->pincode}} <br>
                                       Phone: {{$billing->phone_number}}<br>
                                       Email:{{$billing->email}}
                                   </address>
                                   @endforeach
                                </div>
                                <div class="col-sm-4 invoice-col">

                                    <b>Order ID:{{$order->id}}</b><br>
                                    <b>Order Date:{{$order->created_at}}</b><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Sr. no</th>
                                                    <th>Product Name</th>
                                                    <th>Image</th>
                                                    <th>Qty</th>
                                                    <th>color</th>
                                                    <th>Brand</th>
                                                
                                                    <th>Subtotal</th>
                                                </tr>
                                            </thead>
                                            @php $count=0; @endphp
                                        @foreach ($order_details as $key=>$value)
                                        {{-- {{dd($key, $value)}} --}}
                                        <tbody>
                                            <tr>
                                                <td>{{ $count += 1}}</td>
                                                <td>{{$value->name}}</td>
                                                <td><img src="{{ asset('storage/media/' . $value->image) }}" height="50" width="50"></td>
                                                <td>{{$value->qty}}</td>
                                                <td>{{$value->color_name}}</td>
                                                <td>{{$value->brand_name}}</td>
                                                
                                                <td>₹{{$value->total}}</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>
                                    <p>Case on Delivery</p>

                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Amount Due:
                                        @php echo date_format($address->created_at,'d/m/Y')@endphp</p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:60%"><h3><strong>Total:</strong></h3></th>
                                                <td class="text-left"><b>₹{{$order->total_price}}</b></td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">

                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;"  onclick="window.print()">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
