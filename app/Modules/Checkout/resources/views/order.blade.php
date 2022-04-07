{{-- <!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="template-default template-all">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Abani HTML Theme Home 01 Default</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" type="text/css" href="assets/styles/styles.css" media="all" />
</head>
<body> --}}
	
 @extends('frontend.common')
 @section('title')Checkout @endsection
 @section('content')
	<div class="wrapper"> 
		<div class="page">
			<div class="main-container col1-layout content-color color">
				<div class="breadcrumbs">
					<div class="container">
						<ul>
							<li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
							<li> <strong>Checkout</strong></li>
						</ul>
					</div>
				</div><!--- .breadcrumbs-->
				
				<div class="woocommerce">
					<div class="container">
						<div class="content-top">
							<h2>Checkout</h2>
							<p>Need to Help? Call us: +9 123 456 789 or Email: <a href="mailto:Support@Rosi.com">Support@Rosi.com</a></p>
						</div>
						<div class="checkout-step-process">
							<ul>
								<li>
									<div class="step-process-item"><i data-href="checkout-step2.html"  class="redirectjs  step-icon fa fa-check"></i><span class="text">Billing Address</span></div>
								</li>
								<li>
									<div class="step-process-item"><i class="fa fa-check step-icon "></i><span class="text">Shipping Address</span></div>
								</li>

								<li>
									<div class="step-process-item "><i data-href="checkout-step4.html"  class="redirectjs  step-icon fa fa-check"></i><span class="text">Delivery & Payment</span></div>
								</li>
								<li>
									<div class="step-process-item active"><i data-href="checkout-step5.html"  class="redirectjs  step-icon icon-notebook"></i><span class="text">Order Review</span></div>
								</li>
								
								<li>
									
								</li>
							</ul>
							@if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
						</div><!--- .checkout-step-process --->			
						<form action="{{url('/order')}}" method="POST" name="placeorder_form">
							@csrf
							<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
						<ul class="row">
							<li class="col-md-9 col-padding-right">
								<table class="table-order table-order-review">
									<thead>
										<tr>
											<td width="68">Product Name</td>
											<td width="14">price</td>
											<td width="14">QTY</td>
											<td width="14">Total</td>
										</tr>
									</thead>


									<tbody>
										@php $total=0 @endphp

										@php $total_quantity=0 @endphp
								
										@foreach ($order_items as  $key=>$order)

										@php $total += $order->qty * $order->price @endphp
										@php $total_quantity = $total_quantity+ $order->qty @endphp
											
										
										<tr>
											<td class="name">{{ $order->name }}</td>
											<input type="hidden" name="product_id[]" value="{{ $order->id }}">
											
											<td>{{ $order->price }}</td>
                                      <input type="hidden" name="price[]" value="{{ $order->price }}">

									  <input type="hidden" name="total_quantity"value="{{ $total_quantity }}">

											<td>{{ $order->qty }}</td>
											<input type="hidden" name="qty[]" value="{{ $order->qty }}">

											<td class="price">{{ $order->qty * $order->price }}</td>
											<input type="hidden" name="sub_total[]" value="{{$order->qty * $order->price}}">
											
										</tr>
																		
									</tbody>
									@endforeach
								</table>
								<table class="table-order table-order-review-bottom">
									
									<tr>
										<td class="first large" width="80%">Total Payment</td>
										<td class="price large" width="20%">{{ $total }}</td>
										<input type="hidden" name="total_price" value="{{ $total }}">
									</tr>
									<tfoot>
										<td colspan="2">
											
											<div class="right">
												{{-- <input type="button" value="Back" class="btn-step"> --}}
                                                <a class="btn-step" href="{{ url('/payment') }}">Back</a>
												<input type="submit" value="Place Holder" class="btn-step btn-highligh">
                                                {{-- <a class="btn-step btn-highligh" href="{{ url('payment') }}">Place Holder</a> --}}
											</div>
										</td>
									</tfoot>
								</table>
							</li>
							<li class="col-md-3">
								<ul class="step-list-info">
									@foreach ($billing_address as $billing)
										
									<li>
										<div class="title-step">Billing Address
											<!-- <a href="#">CHANGE</a></div> -->
										<p><strong>{{ $billing->first_name }}</strong><br>
										abc<br>
										{{ $billing->Address }},{{ $billing->pincode }}
										</p>
									</li>
									@endforeach
									<li>
										@foreach ($shipping_address as $shipping)
										<div class="title-step">Shipping Address
											<!-- <a href="#">CHANGE</a></div> -->
										<p><strong>{{ $shipping->first_name }}</strong><br>
										{{ $shipping->Address }},{{ $shipping->pincode }}
										</p>
									</li>
									@endforeach
									
									<li>
										<div class="title-step">Payment Method
											<!-- <a href="#">CHANGE</a> -->
										</div>
										<p>Check / Money order</p>
									</li>
								</ul>
							</li>
						</ul>
					</form>
						
						<div class="line-bottom"></div>
					</div><!--- .container-->	
				</div><!--- .woocommerce-->
			</div><!--- .main-container -->
		</div><!--- .page -->
	</div><!--- .wrapper -->
@endsection