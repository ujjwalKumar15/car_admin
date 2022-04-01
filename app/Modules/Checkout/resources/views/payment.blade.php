<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="template-default template-all">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Abani HTML Theme Home 01 Default</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	<link rel="stylesheet" type="text/css" href="assets/styles/styles.css" media="all" />
</head>
<body>
	<div class="wrapper"> 
		<div class="page">
			<div class="main-container col1-layout content-color color">
				<div class="breadcrumbs">
					<div class="container">
						<ul>
							<li class="home"> <a href="{{url('/')}}" title="Go to Home Page">Home</a></li>
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
									<div class="step-process-item"><i data-href="checkout-step2.html"  class="redirectjs  step-icon fa fa-check"></i><span class="text">Address</span></div>
								</li>
								<li>
									<div class="step-process-item"><i class="fa fa-check step-icon"></i><span class="text">Shipping</span></div>
								</li>
                                   <li>
									<div class="step-process-item active"><i data-href="checkout-step4.html"  class="redirectjs  step-icon icon-wallet"></i><span class="text">Delivery & Payment</span></div>
								</li>
								<li>
									<div class="step-process-item"><i data-href="checkout-step5.html"  class="redirectjs  step-icon icon-notebook"></i><span class="text">Order Review</span></div>
								</li>
								
								<li>
									
								</li>
							</ul>
						</div><!--- .checkout-step-process --->
						
						<div class="checkout-info-text">
							<h3>Delivery</h3>
						</div>
						<div class="content-radio">
							<input type="radio" checked name="delivery-radio" id="delivery-radio-1">
							<label for="delivery-radio-1" class="label-radio">Standard Delivery</label>
							<p>The package will be delivery to your address.</p>
							<form action="" class="form-in-checkout">
								<ul class="row">
									<li class="col-md-9">
										<ul class="row">
											<li class="col-md-6">
												<p class="form-row validate-required">
													<label for="delivery_first_name" class="">First Name <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text " name="delivery_first_name" id="delivery_first_name">
												</p>
											</li>
											<li class="col-md-6">
												<p class="form-row validate-required">
													<label for="delivery_last_name" class="">Last Name <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text" name="delivery_last_name" id="delivery_last_name">
												</p>
											</li>
											<li class="col-md-12 col-left-12">
												<p class="form-row validate-required">
													<label for="delivery_address" class="">Address Name <abbr class="required" title="required">*</abbr></label>
													<input type="text" class="input-text" name="delivery_address" id="delivery_address">
												</p>
											</li>
											<li class="col-md-6">
												<p class="form-row address-field validate-state">
													<label for="delivery_state" class="">State/Province <abbr class="required" title="required">*</abbr></label>
													<select type="text" class="custom-select" name="delivery_state" id="delivery_state">
														<option value="">--Select Option--</option>
														<option value="Stage-1">Stage 1</option>
														<option value="Stage-2">Stage 2</option>
														<option value="Stage-3">Stage 3</option>
														<option value="Stage-4">Stage 4</option>
													</select>
												</p>
											</li>
											<li class="col-md-12 col-left-12 last-row-control">
												<input type="submit" value="Ok" class="btn-step btn-highligh">
												<input type="reset" value="Clear" class="btn-step">
											</li> 
										</ul>
									</li>
								</ul>
							</form>
						</div>
						<div class="checkout-info-text">
							<h3>Payment Method</h3>
						</div>
						<div class="content-radio">
							<input type="radio" name="payment-radio" checked id="pr1">
							<label for="pr1" class="label-radio">Cash On delivary</label>
							<p>Pay for the package when you recieve it.</p>
						</div>
						<div class="content-radio">
							<input type="radio" name="payment-radio" id="pr2">
							<label for="pr2" class="label-radio">Credit Card</label>
							<p>Pay with a credit card</p>
						</div>
						<div class="content-radio">
							<input type="radio" name="payment-radio" id="pr3">
							<label for="pr3" class="label-radio">Paypal</label>
							<p>Pay via paypal</p>
						</div>
						<div class="content-radio">
							<input type="radio" name="payment-radio" id="pr4">
							<label for="pr4" class="label-radio">Other Payment Gateway</label>
							<p>Pay via other payment gateway</p>
						</div>
						<div class="checkout-col-footer">
							{{-- <input type="button" value="Back" class="btn-step"> --}}
                            <a class="btn-step" href="{{ url('/order') }}">Back</a>
							<input type="button" value="Continue" class="btn-step btn-highligh">
						</div>
						<div class="line-bottom"></div>
					</div>
				</div><!--- .woocommerce-->
				
				
			</div><!--- .main-container -->
			
		</div><!--- .page -->
	</div><!--- .wrapper -->
</body>
</html>