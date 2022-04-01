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
							{{-- <p>Need to Help? Call us: +9 123 456 789 or Email: <a href="mailto:Support@Rosi.com">Support@Rosi.com</a></p> --}}
						</div><!--- .content-top-->
						<div class="checkout-step-process">
							<ul>
								<li>
									<div class="step-process-item "><i data-href="checkout-step2.html"  class="redirectjs  step-icon fa fa-check"></i><span class="text">Address</span></div>
								</li>
								<li>
									<div class="step-process-item active"><i class="step-icon-truck step-icon"></i><span class="text">Shipping</span></div>
								</li>
                                <li>
									<div class="step-process-item"><i data-href="checkout-step4.html"  class="redirectjs  step-icon icon-wallet"></i><span class="text">Delivery & Payment</span></div>
								</li>
								<li>
									<div class="step-process-item"><i data-href="checkout-step5.html"  class="redirectjs  step-icon icon-notebook"></i><span class="text">Order Review</span></div>
								</li>
								
								<li>
									
								</li>
							</ul>
						</div><!--- .checkout-step-process --->
						<form name="checkout" method="POST" class="checkout woocommerce-checkout form-in-checkout" action="/shipping">
                            @csrf
							<ul class="row">
								<li class="col-md-9">
									<div class="checkout-info-text">
										<h3>Shipping Address</h3>
										
									</div>

                                    @foreach ($Address_datas as $data )
                                          
                                    <span class="form-radio"><input type="radio" name="address"  value="{{$data->id}}" class="address_click"id="rs1" checked><label for="rs1">{{ $data->Address }}</label></span><br>
                                   
                                  @endforeach
                                  <span class="form-radio"><input type="radio" name="address"  value="0" id="view"><label for="rs1">ADD New Address</label></span>
   
 
                                  <div id="form" class="woocommerce-billing-fields">
									<ul class="row">
                                        <li class="col-md-6">
                                            <p class="form-row validate-required" id="billing_first_name_field">
                                                <label for="billing_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="billing_first_name" id="billing_first_name" placeholder="" value="">
                                            </p>
                                        </li>
                                        <li class="col-md-6">
                                            <p class="form-row validate-required" id="billing_last_name_field">
                                                <label for="billing_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="billing_last_name" id="billing_last_name" placeholder="" value="">
                                            </p>
                                        </li>
                                        <li class="col-md-12  col-left-12">
                                            <p class="form-row  validate-required validate-email" id="billing_email_field">
                                                <label for="billing_email" class="">Email ID <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="billing_email" id="billing_email" placeholder="" value="">
                                            </p>
                                        </li>
                                        <li class="col-md-12  col-left-12">
                                            <p class="form-row  validate-required validate-email" id="#">
                                                <label for="Address" class="">Address <abbr class="required" title="required">*</abbr></label>
                                                <textarea name="billing_address" cols="135" rows="4" id="address"></textarea>
                                            </p>
                                        </li>
                                        
                                        <li class="col-md-6">
                                            <p class="form-row address-field validate-postcode woocommerce-validated" id="billing_postcode_field">
                                                <label for="billing_postcode" class="">Zip code <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="billing_pincode" id="billing_pincode" value="">
                                            </p>
                                        </li>
                                        
                                        <li class="col-md-6">
                                            <p class="form-row validate-required validate-phone woocommerce-validated" id="billing_phone_field">
                                                <label for="billing_phone" class="">Phone number <abbr class="required" title="required">*</abbr></label>
                                                <input type="text" class="input-text " name="billing_phone" id="billing_phone" placeholder="" value="">
                                            </p>
                                        </li>
                                        
                                        {{-- <li class="col-md-12 col-left-12 form-radios">
                                            <span class="form-radio"><input type="radio" name="shipping" value="1" id="rs1" checked><label for="rs1">Ship to this address</label></span>
                                            <span class="form-radio"><input type="radio" name="shipping" value="0" id="rs2"><label for="rs2">Ship to different address</label></span>
                                        </li> --}}
                                    </ul>
                                  </div>
									<div class="checkout-col-footer text-center">
                                        {{-- <a class="btn-step" href="{{ url('/billing') }}">Back</a> --}}
                                        {{-- <a class="btn-step" href="{{ url('/order') }}">Continue</a> --}}
										<input type="submit" value="Continue" class="btn-step">
										<div class="note">(<span>*</span>) Required fields</div>
									</div><!--- .checkout-col-footer--->	
								</li>
							</ul>
						</form><!--- form.checkout--->
						<div class="line-bottom"></div>
					</div><!--- .container--->
				</div><!--- .woocommerce--->
			</div><!--- .main-container -->
		</div><!--- .page -->
	</div><!--- .wrapper -->
    @endsection
    @section('custom_scripts')
    <script>
    jQuery(document).ready(function(){
         jQuery('#form').hide();
         jQuery('.address_click').click( function(){
            jQuery('#form').hide();
    
    
         });
         jQuery('#view').click(function(){
    
            jQuery('#form').show();
    
    
         });
    
    
    
    
    
    
    });
    </script>
    @endsection