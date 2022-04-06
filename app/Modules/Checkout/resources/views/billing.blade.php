
@extends('frontend.common')
@section('title')
    Checkout
@endsection
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
                </div>
                <!--- .breadcrumbs-->

                <div class="woocommerce">
                    <div class="container">
                        <div class="content-top">
                            <h2>Checkout</h2>
                            <p>Need to Help? Call us: +9 123 456 789 or Email: <a
                                    href="mailto:Support@Rosi.com">Support@Rosi.com</a></p>
                        </div>
                        <!--- .content-top-->
                        <div class="checkout-step-process">
                            <ul>
                                <li>
                                    <div class="step-process-item active"><i data-href="checkout-step2.html"
                                            class="redirectjs  step-icon icon-pointer"></i><span
                                            class="text">Billing Address</span></div>
                                </li>
                                <li>
                                    <div class="step-process-item"><i class="step-icon-truck step-icon"></i><span
                                            class="text">Shipping Address</span></div>
                                </li>
                                <li>
                                    <div class="step-process-item"><i data-href="checkout-step4.html"
                                            class="redirectjs  step-icon icon-wallet"></i><span
                                            class="text">Delivery & Payment</span></div>
                                </li>
                                <li>
                                    <div class="step-process-item"><i data-href="checkout-step5.html"
                                            class="redirectjs  step-icon icon-notebook"></i><span
                                            class="text">Order Review</span></div>
                                </li>

                                <li>

                                </li>
                            </ul>
                        </div>
                        <!--- .checkout-step-process --->
                        <form id="billing_form" method="POST" class="checkout woocommerce-checkout form-in-checkout"
                            action="/billing">
                            @csrf
                            <ul class="row">
                                <li class="col-md-9">
                                    <div class="checkout-info-text">
                                        <h3>Billing Address</h3>
                                    </div>
                                    @foreach ($Address_datas as $data)
                                        <span class="form-radio"><input type="radio" name="address"
                                                class="address_click" id="rs1" value="{{ $data->id }}" checked><label
                                                for="get_id">{{ $data->Address }}</label></span><br>
                                    @endforeach

                                    <span class="form-radio"><input type="radio" name="address" value="0"
                                            id="view"><label for="rs1">ADD New Address</label></span>
                                    <div id="form" class="woocommerce-billing-fields">
                                        <ul class="row">
                                            <li class="col-md-6">
                                                <p class="form-row validate-required" id="billing_first_name_field">
                                                    <label for="billing_first_name" class="">First Name <abbr
                                                            class="required" title="required">*</abbr></label>
														
                                                    <input type="text" class="input-text " name="billing_first_name"
                                                        id="billing_first_name" placeholder="" value=""
														oninput="this.value = this.value.replace(/[^A-za-z_\s]/g, '').replace(/(\..*)\./g, '$1');">
														@error('billing_first_name')
														<p style="color: red">{{ $message }}</p>
															
														@enderror
                                                </p>
                                            </li>
                                            <li class="col-md-6">
                                                <p class="form-row validate-required" id="billing_last_name_field">
                                                    <label for="billing_last_name" class="">Last Name <abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <input type="text" class="input-text " name="billing_last_name"
                                                        id="billing_last_name" placeholder="" value=""
														oninput="this.value = this.value.replace(/[^A-za-z_\s]/g, '').replace(/(\..*)\./g, '$1');">
														@error('billing_last_name')
														<p style="color: red">{{ $message }}</p>
															
														@enderror
                                                </p>
                                            </li>
                                            <li class="col-md-12  col-left-12">
                                                <p class="form-row  validate-required validate-email"
                                                    id="billing_email_field">
                                                    <label for="billing_email" class="">Email ID <abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <input type="text" class="input-text " name="billing_email"
                                                        id="billing_email" placeholder="" value="">
														@error('billing_email')
														<p style="color: red">{{ $message }}</p>
															
														@enderror
                                                </p>
                                            </li>
                                            <li class="col-md-12  col-left-12">
                                                <p class="form-row  validate-required validate-email" id="#">
                                                    <label for="Address" class="">Address <abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <textarea name="billing_address" cols="135" rows="4" id="address"></textarea>
													@error('billing_address')
													<p style="color: red">{{ $message }}</p>
														
													@enderror
                                                </p>
                                            </li>

                                            <li class="col-md-6">
                                                <p class="form-row address-field validate-postcode woocommerce-validated"
                                                    id="billing_postcode_field">
                                                    <label for="billing_postcode" class="">Zip code <abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <input type="text" class="input-text " name="billing_pincode"
                                                        id="billing_pincode" value=""
														oninput="this.value = this.value.replace(/[^0-9\s]/g, '').replace(/(\..*)\./g, '$1');">
														@error('billing_pincode')
														<p style="color: red">{{ $message }}</p>
															
														@enderror
														
                                                </p>
                                            </li>

                                            <li class="col-md-6">
                                                <p class="form-row validate-required validate-phone woocommerce-validated"
                                                    id="billing_phone_field">
                                                    <label for="billing_phone" class="">Phone number <abbr
                                                            class="required" title="required">*</abbr></label>
                                                    <input type="text" class="input-text " name="billing_phone"
                                                        id="billing_phone" placeholder="" value=""
														oninput="this.value = this.value.replace(/[^0-9\s]/g, '').replace(/(\..*)\./g, '$1')">
														@error('billing_phone')
														<p style="color: red">{{ $message }}</p>
															
														@enderror
													
                                                </p>
                                            </li>

                                            {{-- <li class="col-md-12 col-left-12 form-radios">
												<span class="form-radio"><input type="radio" name="shipping" id="rs1"><label for="rs1">Ship to this address</label></span>
												<span class="form-radio"><input type="radio" name="shipping" id="rs2"><label for="rs2">Ship to different address</label></span>
											</li> --}}
                                        </ul>
                                    </div>
                                    <!--- .woocommerce-billing-fields--->
                                    <div>
                                <li class="col-md-12 col-left-12 form-radios">
                                    <span class="form-radio"><input type="radio" name="shipping" value="1"
                                            id="rs1"><label for="rs1">Ship to this address</label></span>
                                    <span class="form-radio"><input type="radio" name="shipping" value="0"
                                            id="rs2"><label for="rs2">Ship to different address</label></span>
                                </li>
                    </div>

                    <div class="checkout-col-footer text-center">
                        {{-- <a class="btn-step" href="{{ url('shipping') }}">Continue</a> --}}
                        <input type="submit" value="Continue" class="btn-step">
                        <div class="note">(<span>*</span>) Required fields</div>
                    </div>
                    <!--- .checkout-col-footer--->
                    </li>
                    </ul>
                    </form>
                    <!--- form.checkout--->
                    <div class="line-bottom"></div>
                </div>
                <!--- .container--->
            </div>
            <!--- .woocommerce--->
        </div>
        <!--- .main-container -->
    </div>
    <!--- .page -->
    </div>
    <!--- .wrapper -->
@endsection
@section('custom_scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery('#form').hide();
            jQuery('.address_click').click(function() {
                jQuery('#form').hide();


            });
            jQuery('#view').click(function() {

                jQuery('#form').show();


            });





        });

		jQuery.validator.addMethod("mobile", function(phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length > 9 && 
    phone_number.match(/^(\+?1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
}, "Please Enter a valid phone number");
     $('billing_form').validate({
        rules: {
                billing_first_name: {

                    required: true,
                    maxlength:50,

                   },
				   billing_last_name:{
					   required:true,
                       maxlength:50,


				   },
				   billing_email:{
					   required:true,
                       email:true,
                       maxlength:60,
				   },
				   billing_phone:{
					   required:true,
                       mobile:true,
				   },
				   billing_address:{
					   required:true,
                       maxlength:250,

				   },
				   billing_pincode:{
					   required:true,
                       maxlength:6,
                    minlength:6,
                    number:true,
				   },




            },
			messages:{
				billing_first_name:{

					required:"Name Field is Required!!!",
				},


			},

    });


    </script>
@endsection
