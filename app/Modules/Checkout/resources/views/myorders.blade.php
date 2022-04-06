
@extends('frontend.common')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="main-container col1-layout content-color color">
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li class="home"><a href="/" title="Go to Home Page">Home</a></li>
                    <li><strong>My Orders</strong></li>
                </ul>
            </div>
        </div>
        <!--- .breadcrumbs-->
        <div class="container">
            <div class="content-top no-border">
                <h2>My Orders</h2>
				
                
                    <div class="blog-mansory" style="position: relative; height: 1775.03px; max-width: 100%">
                        <div class="blog-mansory-item" style="position:inherit !important;max-width: 100%">
                            <div class="blog-mansory-item-content" style="border: solid #e1e1e3;">
                                <div class="row">
                                    <div class="col-md-12">
										@foreach ($orders as $order)
                                        <div class="text-right" style="margin-bottom: 10px">
                                            Date & Time:{{ $order->created_at }}
											
                                        </div>
									
										
									
                                        <div class="row" style="margin-bottom: 10px">
                                            <div class="col-md-4">
                                                <div class="card m-b-20">
                                                    <div class="card-header">
												@foreach ($billing_address as $bill_address )
													
													
                                                        <h3>Billing Address</h3>
                                                    </div>
                                                    <div class="card-block">
                                                        <h4>{{ $bill_address->first_name }}</h4>
                                                        <h6 class="card-subtitle text-muted">
                                                            {{-- {{ $bill_address->billing_address->name }}</h6> --}}
                                                        <p class="card-text">
															{{ $bill_address->Address }}-<br>
															{{ $bill_address->pincode }}<br>
															+{{ $bill_address->phone_number }}
                                                        </p>
                                                    </div>
													@endforeach	
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card m-b-20">
                                                    <div class="card-header" style="font-weight: bold">
														@foreach ($shipping_address as $ship_Address)
                                                        <h3>Shipping Address</h3>
                                                    </div>
                                                    <div class="card-block">
                                                        <h4>{{ $ship_Address->first_name }}</h4>
                                                        <h6 class="card-subtitle text-muted">
                                                            {{-- {{ $order_detail->shipping_address->name }}</h6> --}}
                                                        <p class="card-text">
															{{ $ship_Address->Address}}-<br>
															{{ $ship_Address->pincode }}<br>    
															+{{ $ship_Address->phone_number }}
                                                        </p>
                                                    </div>
													@endforeach
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <h3>Payment Information</h3>
                                                    </div>
                                                    <div class="card-block">
                                                        <div class="font-weight-bold">
                                                            Method: 
                                                            <span class="font-weight-normal">Cash On Delivey</span>
                                                        </div>
                                                        <div class="col-12"><br><br>
                                                            <button type="button" class="btn btn-light"
                                                                style="float: right;">
																<a href="{{ url('/myorders_view',$order->id) }}" class=""> <i class="fa fa-eye fa-lg"></i>&nbsp;View Product<a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>	@endforeach
                                        <div style="width: 100%;border-bottom: solid #e1e1e3;margin-bottom: 10px"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="bottom text-right"
                                style="border: solid #e1e1e3; background-color:#955251; color:white;">
                                <div class="col-50" style="width: 30%"><b>Order
                                        Status:&nbsp;{{ $order->order_status }}</div>
                                <div class="col-50" style="width: 30%">Total
                                    Price:&nbsp;{{ $order->total_price }} </b> </div>
                            </div>
                        </div>
                    </div>
              
            </div>
        </div>
        <!--- .container-->
    </div>
    <!--- .main-container -->
@endsection