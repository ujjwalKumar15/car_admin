
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>AdminLTE 3 | Dashboard</title>
    
      <!-- Google Font: Source Sans Pro -->
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
      <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
      <!-- Ionicons -->
      <link rel="stylesheet" href="{{asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
      <!-- Tempusdominus Bootstrap 4 -->
      <link rel="stylesheet" href="{{asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
      <!-- iCheck -->
        <link rel="stylesheet" href="{{asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
      <!-- JQVMap -->
      <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
      <!-- Theme style -->
      <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
      <!-- overlayScrollbars -->
      <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
      <!-- Daterange picker -->
      <link rel="stylesheet" href="{{asset('plugins/daterangepicker/daterangepicker.css')}}">
      <!-- summernote -->
        <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

        {{-- angular js --}}
       
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

  @include('css')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
     @include('header')
       @include('sidebar')
     {{-- @yield('content')  --}}
     <div class="content-wrapper">
      
        <div class="content-header">
            <div class="container-fluid">
              <div class="row mb-2">
                <div class="col-sm-6">
    
                </div><!-- /.col -->
                <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item active"><a href="{{url('/admin/dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item active"><a href="{{url('/admin/product/display')}}">Product</a></li>
                    <li class="breadcrumb-item">Add</li>
    
                  </ol>
                </div><!-- /.col -->
              </div><!-- /.row -->
            </div><!-- /.container-fluid -->
          </div>
        <section class="content">
           
        
           @if (session()->has('status'))
          
           <div class="alert alert-success float-center">
            {{ session('status') }}
           </div>
           @endif
          
            <form  id="form_try" method="POST" action="/admin/products/insertproduct" enctype="multipart/form-data">
                @csrf

          <div class="container-fluid">
            <div class="card card-danger">
                <div class="card-header">
                <h3 class="card-title">Add Product</h3>
    
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
                <!-- /.card-header -->

              
                <div class="card-body">
                    <h6>The All Fields With Sysmbol <span class="text-danger">*</span>is Required</h6>
                    <div class="row">
                        <div class="col-md-12">



                            <label for="name"> Product Name<span class="text-danger">*</span></label>
                            <span id="Name_Error" class="text-danger"></span>
                            <input type="text"  name="name" placeholder="Enter Product Name" oninput="this.value = this.value.replace(/[^A-za-z0-9_\s]/g, '').replace(/(\..*)\./g, '$1');" class="form-control allowed_name" id="replace" >
                            <br>
                       
                       <a href="#" > http//localhost/<span id="url" name="url"> </span></a> <input type="text" id="edit_url" name="url" placeholder="Enter Product Url"  class="form-control access_url" >
                         
                          @error('name')
                          
                    <p style="color:red">{{ $message }}</p>
                      
                    @enderror
                    
                           
                        </a>
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="inputcategory">Product Category<span class="text-danger">*</span></label>
                      <select id="category_id" name="category_id"class="form-control">
                        <option value="">Select Product Category</option>
                         @foreach ($brands as $list )
                           
                        <option value="{{ $list->bid }}">{{ $list->bname }}</option>
                            
                        @endforeach 

                      </select>
                      @error('category_id')
                      <p style="color:red">{{ $message }}</p>
                        
                      @enderror

                    </div>
                    <div class="form-group col-md-3">
                      <label for="color_id">Product Color<span class="text-danger">*</span></label>
                      <select id="color_id" name="color_id"class="form-control" required>
                        <option value="">Select Product Color</option>
                        @foreach ($colors as $list )

                        <option value="{{ $list->cid }}">{{ $list->cname }}</option>
                            
                        @endforeach
                        
                      </select>
                      @error('color_id')
                          
                      <p style="color:red">{{ $message }}</p>
                        
                      @enderror
                      

                    </div>
                    <div class="col-md-3">
                        <label for="price">Product Price<span class="text-danger">*</span></label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                          </div>
                          <input type="text" name="price"class="form-control"  placeholder="Enter Product Price" min="1" id="price"   oninput="this.value = this.value.replace(/[^./0-9_\s]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('price')}}">
                        </div>
                        @error('price')
                        <p style="color:red">{{ $message }}</p>
                           
                        @enderror
                       
                    </div>
                </div>
    
                <!-- /.row -->
                <div class="form-row">
                    
                    <div class="col-md-3">
                        <label for="inputupc">Product UPC<span class="text-danger">*</span></label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-tag"></i></div>
                          </div>
                          <input type="text" name="upc"  placeholder="Enter Product Upc Number" class="form-control" oninput="this.value = this.value.replace(/[^/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('upc')}}"id="upc">
                        </div>
                        @error('upc')
                        <p style="color:red">{{ $message }}</p>
                          
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="inputstock">Product Quantity<span class="text-danger">*</span></label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-layer-group"></i></div>
                          </div>
                          <input type="text" name="quanty"  min="1" placeholder="Enter Product Quantity" oninput="this.value = this.value.replace(/[^/0-9_\s]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" id="quanty">
                        </div>
                        @error('quanty')
                        <p style="color:red">{{ $message }}</p>
                          
                        @enderror
                    </div>
                    <div class="form-group col-md-3">
                      <div class="form-group">
                          <label>Select Product Main Image<span class="text-danger">*</span></label>
                         <input type="file" class="form-control"onchange="readURL(this);"   id="upload" name="image" accept=".png, .jpg, .jpeg"/>
                        
                        </div>
                        @error('image')
                        <p style="color:red">{{ $message }}</p>
                          
                        @enderror
                          <img id="imageResult" src="{{ asset('dist/img/imagepreview.jpg')}}"  style="height:100px; width:100px; border:1px rgb(11, 12, 11);" >  
                         
                    
                    </div>
                  </div>

                <div class="form-row">

                    <div class="col-sm-3">
                        <!-- text input -->
                        {{-- <div class="form-group">
                          <label>Discription<span class="text-danger">*</span></label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="This Box has a Limit of 1000 Chars"></textarea>
                        </div> --}}
                        <label>Product Description<span class="text-danger">*</span></label>
                        <div class="input-group mb-12">
    
                            <div class="input-group-prepend">
                              <div class="input-group-text">250</i></div>
                            </div>
                            <textarea class="form-control"  name="description" id="exampleFormControlTextarea1" cols="6" rows="3" placeholder="This Box has a Limit of 250 Chars"></textarea>
                          </div>
                          @error('discription')
                          <p style="color:red">{{ $message }}</p>
                            
                          @enderror
            
                    </div>
                    {{-- <div class="col-sm-6">
    
                        <div class="form-group">
                          <label>Main Image<span class="text-danger">*</span></label>
                         <input type="file" class="form-control" name="image">
                        </div>
                    </div> --}}
                </div>

                {{-- multiple image  --}}
                <hr>
                <div class="form-row">
                    <div class="col-lg-6">
                        <div id="inputFormRow">
                            <label>Select Multiple Images<span class="text-danger">*</span></label>
                            @error('subimage[]')
                            <p style="color:red">{{ $message }}</p>
                              
                            @enderror
                            {{-- <label class=" col-md-8 text-right">Sort<span class="text-danger">*</span></label> --}}
                            <div class="input-group mb-3">
                             
    
                                <input type="file" id="subimage[]" name="subimage[]" class="form-control m-input" autocomplete="off" accept="image/*">

                        
                                <div class="col-lg-3">
                          
                                     <input type="number" name="sort[]"  maxlength="2" class="form-control m-input" autocomplete="off" min="1" max="10" placeholder="Sort number">
                                    </div>
                                @error('sort[]')
                                <p style="color:red">{{ $message }}</p>
                                  
                                @enderror
                               
                                <div class="input-group-append">
                                    <button id="addRow" type="button" class="  btn btn-success "><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Add Row</button>
                                </div>
                            </div>
                            {{-- <div class="col-lg-4">
                                <label>Sort<span class="text-danger">*</span></label>
                            <input type="number" name="title[]" class="form-control m-input" autocomplete="off">
                            </div> --}}
                        </div>
    
                        <div id="newRow"></div>
                        {{-- <button id="addRow" type="button" class="  btn btn-success "><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Add Row</button> --}}
                    </div>
                </div>
                <hr>
                <div class="from-row">
                    <div align="center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                
                </div>
         
    



            </div>
            </div>
          </div>
        </form>
        </section>

   {{-- edit_page_Jquery_link_is _below --}}
{{-- <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>  --}}


    @include('footer')

      
  </div>

 
</body>
  
<script type="text/javascript">
    // add row
    var i = 1;
    $("#addRow").click(function () {
        ++i;
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="file" name="subimage['+i+']" class="form-control m-input" autocomplete="off"accept="image/*">';
        html += '<div class="col-lg-3">';
        html += '<input type="number" name="sort['+i+']" class="form-control m-input" autocomplete="off" min="1" max="10" placeholder="Sort Number">'
        html += '</div>';
        html += '<div class="input-group-append">';
        html += '<button id="removeRow" type="button" class="btn btn-danger"><i class="fas fa-times-circle"></i>&nbsp;&nbsp;Remove</button>';
        html += '</div>&nbsp;';

        html += '</div>';

        $('#newRow').append(html);
    });

    // remove row
    $(document).on('click', '#removeRow', function () {
        $(this).closest('#inputFormRow').remove();
    });

</script>





<script type="text/javascript">
 $('#replace,#edit_url').on("change keyup paste click",function() {
    var dInput = this.value;
	var t=dInput.toLowerCase();
	 if (t.match(/ /g)) {
	t = t.replace(/\s+/g, '-'); 
	}
    document.getElementById('url').innerHTML = t
    console.log(t);
    $('.access_url').val(t);

  });


    //upload image preview
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imageResult')
                .attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}


</script>



{{-- url Not Allowed Special Characters --}}

 <script type="text/javascript">
  $(function  () {
      $("#edit_url").keypress(function (e) {
          var keyCode = e.keyCode || e.which;

          $("#url").html("");

          //Regex for Valid Characters i.e. Alphabets and Numbers.
          var regex = /^[0-9a-zA-Z\s]+$/;
          //Validate TextBox value against the Regex.
          var isValid = regex.test(String.fromCharCode(keyCode));
          if (!isValid) {
              $("#url").html("Only Alphabets allowed.");
          }

          return isValid;
      });
  }); 
</script>


<script>

//   // validation
  jQuery.validator.addMethod( "pricevalidate", function( value, element ) {
         return this.optional(element) || /^((?:\d|\d{1,3}(?:,\d{3})){0,6})(?:\.\d{1,2}?)?$/.test(value);
       }, "The price must be in this 999999.999 Digit" );
  $.validator.addMethod('filesize', function (value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'File size must be less than 5mb');

$("#form_try").validate({
                rules: {
                    name:{
                        required: true,
                        remote:{
                            url: '/admin/products/checkurl',
                            type: "GET",
                            data: {
                                colorname: function () {
                                    return $( "#name" ).val();
                                }
                            },
                        }
                        
                    },
                    url:{
                        required: true,
                        remote:{
                            url: '/admin/products/checkurl',
                            type: "GET",
                            data: {
                                colorname: function () {
                                    return $( "#url" ).val();
                                }
                            },
                        }
                    },
                    category_id:{
                      required: true,

                    },
                    color_id:{
                          required:true,
                    },
                    
                    upc:{
                      required:true,
                      number:true,
                      minlength: 12,
                      maxlength: 12,
                      remote:{
                            url: '/admin/products/uniqueproduct',
                            type: "GET",
                            data: {
                                colorname: function () {
                                    return $( "#upc" ).val();
                                }
                            },
                        }
                    },
                    
                   quanty:{
                     required:true,
                     number:true,
                   },
                   price:{
                      required:true,
                      number:true,
                      pricevalidate:true,
                    },
                    

                   image: {
                     required: true,
                  //   extension: "jpg,jpeg,png",
                  //   filesize: 5,
                    },
                   
                   description:{
                     required:true,
                     maxlength:1000
                   },
                   
                   'subimage[]':{
                     required: true,
                  //   extension: "jpg,jpeg,png",
                  //   filesize: 5,
                   
                    },
                  'sort[]':{
                     required: true,
                  //   extension: "jpg,jpeg,png",
                  //   filesize: 5,
                   
                    },

                    
                },

                messages: {
                     name: {
                        required: 'The Name field is required.',
                        remote:'The Name has already been taken.',
                    },

                    price: {
                        required: 'The Price field is required.',
                        number:"The Price must be in number",

                    },
                    url: {
                        required: 'The Url field is required.',
                       

                    },
                    
                    image: {
                        required: 'The Image field is required.',

                    },
                    quanty:{
                      required: 'The Quantity field is required.',
                        number:"The Quantity must be in number",

                    },
                    
                    description: {
                        required: 'The Description field is required.',
                        maxlength:"The Description may not be grater than 250 Digit",

                    },
                    
                    upc:{
                      required:"The Upc field is required",
                      number:"The Upc must be in number",
                      remote:'The Upc has already been taken.',
                      minlength:"The Upc may not be less than 12 Digit",
                      maxlength:"The Upc may not be grater than 12 Digit"
                

                    },
                  errorPlacement: function(error, element)
                  {
                        error.appendTo( element.parents('.form-group'));
                  },
                        
                  submitHandler: function (form) {
                   form.submit();
                }
                },


               


        });





</script>


{{-- image validation try --}}


<script>

 document.getElementById('upload'). onfocusout = function (){
    var image=document.getElementById('upload').value;
        if(image!=''){
          var checkimg = image.toLowerCase();
          if(!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG)$/)){
             alert("Please Select jpg,png File"); 
             document.getElementById('upload').value="";
           
          }
          var image=document.getElementById('upload');
          var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2);
          if (size > 2){
              alert("Please Select Size Less Than 2 MB"); 
             document.getElementById('upload').value="";
        
          }
        }
  
  }
  
  </script>
  






</html>