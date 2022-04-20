@extends('frontend.common')
@section('title')
    Payment Method
@endsection

@section('content')
    <div class="wrapper">
        <div class="page">
            <div class="main-container col1-layout content-color color">
                <div class="breadcrumbs">
                    <div class="container">
                        <ul>
                            <li class="home"> <a href="{{ url('/') }}" title="Go to Home Page">Home</a></li>
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
                        <div class="checkout-step-process">
                            <ul>
                                <li>
                                    <div class="step-process-item"><i data-href="checkout-step2.html"
                                            class="redirectjs  step-icon fa fa-check"></i><span
                                            class="text">Billing Address</span></div>
                                </li>
                                <li>
                                    <div class="step-process-item"><i class="fa fa-check step-icon"></i><span
                                            class="text">Shipping Address</span></div>
                                </li>

                                <li>
                                    <div class="step-process-item active"><i data-href="checkout-step4.html"
                                            class="redirectjs  step-icon icon-wallet"></i><span
                                            class="text">Upload Document</span></div>
                                </li>

                                <li>
                                    <div class="step-process-item "><i data-href="checkout-step4.html"
                                            class="redirectjs  step-icon icon-wallet"></i><span
                                            class="text">Delivery & Payment</span></div>
                                </li>
                                <li>
                                    <div class="step-process-item"><i data-href="checkout-step5.html"
                                            class="redirectjs  step-icon icon-notebook"></i><span
                                            class="text">Order Review</span></div>
                                </li>

                            </ul>
                        </div>
                        <!--- .checkout-step-process --->
                        <div class="checkout-info-text">
                            <h3></h3>
                        </div>
                        <div class="checkout-info-text">
                            <h3>Upload Document</h3>
                        </div>


                        <form id="form_try" method="POST" action="/document" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <br>
                                    <h4>Select Product Main Image<span class="text-danger">*</span></h4>
                                    <input type="file" class="form-control" onchange="readURL(this);" id="upload"
                                        name="image" accept=".png, .jpg, .jpeg" />

                                </div>

                                <img id="imageResult" src="{{ asset('dist/img/imagepreview.jpg') }}"
                                    style="height:100px; width:100px; border:1px rgb(11, 12, 11);">
                            </div>



                            <br>
                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <h4> Upload Your Aadhaar <span class="text-danger">*</span></h4>
                                    <input class="form-control" type="file" name="aadhar" accept="application/pdf" />
                                </div>
                            </div>

                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <h4> Enter Your Aadhaar Number<span class="text-danger">*</span></h4>
                                    <input maxlength="12" type="number" class="form-control" id="aadhaar_number"
                                        name="aadhar_no" placeholder="Aadhaar Number" required="">
                                    <p id="aadhaar_number_op"></p>
                                </div>

                                {{-- <label for="aadhaar_number" class="col-lg-5 control-label">Aadhaar Number&nbsp;<span style="color: red">*</span></label> --}}
                                {{-- <div class="col-lg-7 ">
                                    <input maxlength="12" type="number" class="form-control" id="aadhaar_number"
                                        name="aadhaar number" placeholder="Aadhaar Number" required="">
                                    <p id="aadhaar_number_op"></p>
                                </div> --}}
                            </div>





                            <div class="form-group col-md-3">
                                <div class="form-group">
                                    <h5>Upload Your Driving License<span class="text-danger">(Optional)</span></h5>
                                    <input class="form-control" type="file" name="dl" accept="application/pdf" />
                                </div>
                            </div>
                    </div>


                    {{-- <div class="form-group col-md-3">
                        <div class="form-group">
                            <label for="formFileMultiple" class="form-label">Upload Your Driving License <span
                                    class="text-danger">(Optional)</span> </label>
                            <input class="form-control" type="file" name="dl" id="formFileMultiple"
                                accept="application/pdf" />
                        </div>
                    </div>
                    <br> --}}

                </div>
                <div class="checkout-col-footer text-center">
                    <a class="btn-step " href="{{ url('/shipping') }}">Back</a>
                    {{-- <a class="btn-step " href="{{ url('/order_review') }}">Continue</a> --}}
                    {{-- <input type="button" value="Back" class="btn-step"> --}}
                    <input type="submit" value="Continue" class="btn-step btn-highligh">
                </div>
                <div class="line-bottom"></div>
                </form>
            </div>
        </div>
        <!--- .woocommerce-->
    </div>
    <!--- .main-container -->
    </div>
    <!--- .page -->
    </div>
    <!--- .wrapper -->
@endsection

@section('custom_scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imageResult')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        // multiplication table d
var d = [
  [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
  [1, 2, 3, 4, 0, 6, 7, 8, 9, 5],
  [2, 3, 4, 0, 1, 7, 8, 9, 5, 6],
  [3, 4, 0, 1, 2, 8, 9, 5, 6, 7],
  [4, 0, 1, 2, 3, 9, 5, 6, 7, 8],
  [5, 9, 8, 7, 6, 0, 4, 3, 2, 1],
  [6, 5, 9, 8, 7, 1, 0, 4, 3, 2],
  [7, 6, 5, 9, 8, 2, 1, 0, 4, 3],
  [8, 7, 6, 5, 9, 3, 2, 1, 0, 4],
  [9, 8, 7, 6, 5, 4, 3, 2, 1, 0]
];

// permutation table p
var p = [
  [0, 1, 2, 3, 4, 5, 6, 7, 8, 9],
  [1, 5, 7, 6, 2, 8, 3, 0, 9, 4],
  [5, 8, 0, 3, 7, 9, 6, 1, 4, 2],
  [8, 9, 1, 6, 0, 4, 3, 5, 2, 7],
  [9, 4, 5, 3, 1, 2, 6, 8, 7, 0],
  [4, 2, 8, 6, 5, 7, 3, 9, 0, 1],
  [2, 7, 9, 3, 8, 0, 6, 4, 1, 5],
  [7, 0, 4, 6, 9, 1, 3, 2, 5, 8]
];

// inverse table inv
var inv = [0, 4, 3, 2, 1, 5, 6, 7, 8, 9];

// converts string or number to an array and inverts it
function invArray(array) {

  if (Object.prototype.toString.call(array) === "[object Number]") {
    array = String(array);
  }

  if (Object.prototype.toString.call(array) === "[object String]") {
    array = array.split("").map(Number);
  }

  return array.reverse();

}

// generates checksum
function generate(array) {

  var c = 0;
  var invertedArray = invArray(array);

  for (var i = 0; i < invertedArray.length; i++) {
    c = d[c][p[((i + 1) % 8)][invertedArray[i]]];
  }

  return inv[c];
}

// validates checksum
function validate(array) {

  var c = 0;
  var invertedArray = invArray(array);

  for (var i = 0; i < invertedArray.length; i++) {
    c = d[c][p[(i % 8)][invertedArray[i]]];
  }

  return (c === 0);
}

var g_aadhar_num = "";
$(document).ready(function() {
  $("#aadhaar_number_op")[0].innerText = "Enter 12 digits...";
  $('#aadhaar_number').keyup(function() {
      $("#aadhaar_number_op")[0].innerText = "Enter " + (12 - $('#aadhaar_number')[0].value.length) + " more digits...";
      if ($('#aadhaar_number')[0].value.length == 12) {
        g_aadhar_num = $('#aadhaar_number')[0].value;
        if (validate($('#aadhaar_number')[0].value) == true) {
          $("#aadhaar_number_op").attr("style", "color:green");
          $("#aadhaar_number_op")[0].innerText = "Checksum Pass!"
        } else {
          $("#aadhaar_number_op").attr("style", "color:red");
          $("#aadhaar_number_op")[0].innerText = "Checksum Fail! Invalid Aadhar"
        }
      } else if($('#aadhaar_number')[0].value.length > 12) {
      $("#aadhaar_number_op")[0].innerText = "can't enter more than 12 digits...";
      $('#aadhaar_number')[0].value = g_aadhar_num;
    }
  });
});
    </script>
@endsection
