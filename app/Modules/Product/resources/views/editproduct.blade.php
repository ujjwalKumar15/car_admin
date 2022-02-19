
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
        <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>

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
      <form method="post" action="{{ url('admin/products/editproduct/'.$product->id)}}" enctype="multipart/form-data">
        

          @csrf
      <div class="container-fluid">
        <div class="card card-danger ">
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
                <div class="text-center mt-0 mb-0 p-1">
                    <a class="btn btn-danger bg-gradient-danger  btn-sm float-right " href="{{url('/admin/products/listproduct')}}"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>&nbsp;

                  </div>
                <h6>The All Fields With Sysmbol <span class="text-danger">*</span>is Required</h6>
                <div class="row" >
                    <div class="col-md-12" >
                        <label for="name">Name<span class="text-danger">*</span></label>
                        <input type="text"class="form-control" id="replace"  value="{{$product->name}}"  name="name">
                    <a href=" " > http//localhost/<span id="url"></span> </a>
                    <input type="hidden" class="form-control access_url" id="url" name="url" >
                        <i class="fas fa-edit"></i>
                    </div>
                    
                </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputcategory">Category<span class="text-danger">*</span></label>
                  <select id="inputcategory" name="brand_id" class="form-control" >
                    @foreach ($brands as $brand)
                    <option selected >{{$brand->bname}}</option>
                    <option value="{{$brand->bid}}">{{$brand->bname}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputcolor">color<span class="text-danger">*</span></label>
                  <select id="inputcolor" id="color_id" name="color_id" class="form-control">
                    <option selected>Select Color</option>
                    @foreach ($colors as $color)
                        <option  value="{{$color->cid}}" @if($color->cid == $product->colorid) selected @endif>{{$color->cname}}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-md-6">
                    <label for="inputPrice">Price<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                      </div>
                      <input type="text" class="form-control" name="price"value="{{$product->price}}"  id="inlineFormInputGroup">
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <div class="form-row">
                
                <div class="col-md-3">
                    <label for="inputupc">UPC<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-tag"></i></div>
                      </div>
                      <input type="text" class="form-control" name="upc" disabled value="{{$product->upc}}"id="inlineFormInputGroup" >
                    </div>
                </div>
                <div class="col-md-6">
                    <label for="inputstock">Stock<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">
                      <div class="input-group-prepend">
                        <div class="input-group-text"><i class="fas fa-layer-group"></i></div>
                      </div>
                      <input type="text" class="form-control" name="stock" value="{{$product->quanty}}" id="inlineFormInputGroup">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-sm-6">
                    <label>description<span class="text-danger">*</span></label>
                    <div class="input-group mb-2">

                        <div class="input-group-prepend">
                          <div class="input-group-text">1000</i></div>
                        </div>
                        <textarea class="form-control"name="description" rows="3" placeholder="This Box has a Limit of 1000 Chars">{{$product->description}}</textarea>
                        {{-- <textarea  rows="3" cols="30" name="bgraphy"value="{{$product->description}}"class="form-control"></textarea> --}}
                      </div>
                </div>
                <div class="col-sm-6">
                    <label>Main Image<span class="text-danger">*</span></label>
                    <div class="form-group">

                      <img src="{{asset('storage/media/'.$product->image) }}" onerror="this.src='./assets/img/user.jpg';" alt="Missing Image" style="height:100px; width:100px; border:1px green solid;">
                     <input type="file" class="form-control" name="image">
                    </div>
                </div>
            </div>
            <hr>
            {{-- <div class="form-row">
                <div class="col-lg-9">
                    <div id="inputFormRow">
                        <label>Images<span class="text-danger">*</span></label>
            .            <label class=" col-md-8 text-right">Sort<span class="text-danger">*</span></label> --}}
                        {{-- <div class="input-group mb-3">

                            <input type="file" name="subimage[1]" class="form-control m-input" autocomplete="off">
                            <div class="col-lg-3">
                                 <input type="number" name="sort[1]" class="form-control m-input" autocomplete="off"  placeholder="Sort number">
                             {{-- ..... --}}

                            {{-- <div class="input-group-append">
                                <button id="addRow" type="button" class="  btn btn-success "><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Add Row</button>
                            </div>
                        </div>
                        <div class="col-lg-4"> --}}
                            {{-- <label>Sort<span class="text-danger">*</span></label>
                        <input type="number" name="title[]" class="form-control m-input" autocomplete="off">
                        </div> --}}
                    {{-- </div>

                    <div id="newRow"></div>
                    {{-- <button id="addRow" type="button" class="  btn btn-success "><i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp; Add Row</button> --}}
                {{-- </div>
            </div> --}} 

{{--   start.................2 --}}

{{-- start image try  --}}

<div class="multiple_img_list pb-3">
  <p>Select Multiple Images</p>

  
  @foreach($images as $image)
      <div class="more_img">
          <div class="row">
              <div class="col-md-4">
                  <div class="row">
                      <div class="col-md-10">
                          <div class="form-group">
                              <input type="file" name="sub_img[]"  onchange="readURLSubimg(this);"  class="form-control moreImgInp @error('sub_img') is-invalid @enderror" data-iconname="fa fa-cloud-upload" data-buttonname="btn-secondary" accept="image/*"/>
                              <input class="form-control  @error('img_id') is-invalid @enderror img_id" value="{{$image->id}}" name="img_id[]" type="hidden">
                              @error('sub_img')
                              <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                              @enderror
                          </div>
                      </div>
                      <div class="col-md-2">
                          <img alt="Product Image" id="sub_image" src="{{asset('storage/media/'.$image->product_images) }}" class="img-thumbnail sub_image">
                      </div>
                  </div>
              </div>
              <div class="col-md-4">
                  <div class="form-group">
                      <input class="form-control  @error('sort') is-invalid @enderror" value="{{$image->sort}}" name="sort[]" type="text" id="sort" maxlength="2" onkeypress="if(this.value.length==2);" placeholder="Sort Number" id="{{$image->id}}">
                      @error('sort')
                      <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                  </div>
              </div>
              <div class="col-md-4">
                  <button name="add_img" id="add_img" type="button" class="btn btn-outline-primary add_img">
                      <i class="fa fa-plus" aria-hidden="true"></i>
                  </button>
                  <button name="remove_img" id="{{$image->id}}" type="button" class="btn btn-outline-warning remove_img">
                      <i class="fa fa-minus" aria-hidden="true"></i>
                  </button>

              </div>
          </div>
      </div>
  @endforeach
  <div class="more_img" style="display:none">
      <div class="row">
          <div class="col-md-4">
              <div class="row">
                  <div class="col-md-10">
                      <div class="form-group">
                          <input type="file" name="sub_img[]"  class="form-control @error('sub_img') is-invalid @enderror" data-iconname="fa fa-cloud-upload" data-buttonname="btn-secondary" accept="image/*"/>
                          @error('sub_img')
                          <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span>
                          @enderror
                      </div>
                  </div>
                  <div class="col-md-2">
                      <img  id="sub_image" class="img-thumbnail sub_image">
                      {{-- onerror="this.{{asset('storage/media/'.no_image.png) }}"  --}}
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                  <input class="form-control @error('sort') is-invalid @enderror" value="" name="sort[]" type="text" id="sort" maxlength="2" onkeypress="if(this.value.length==2);" placeholder="Sort Number">
                  @error('sort')
                  <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                  @enderror
              </div>
          </div>
          <div class="col-md-4">
              <button name="add_img" id="add_img" type="button" class="btn btn-outline-primary add_img">
                  <i class="fa fa-plus" aria-hidden="true"></i>
              </button>
              <button name="remove_img"  id="remove_img" type="button" class="btn btn-outline-warning remove_img" style="display: none">
                  <i class="fa fa-minus" aria-hidden="true"></i>
              </button>
          </div>
      </div>
  </div>
</div>



{{-- end______________2 --}}


    <hr>
            <div class="from-row">
                <div align="center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </div>

        </div>
      </div></form>
    </section>

{{-- edit_page_Jquery_link_is _below --}}
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> 


 @include('footer')
     </div>
</body>

<script type="text/javascript">
  $('#replace').keyup(function() {
    var dInput = this.value;
	var t=dInput.toLowerCase();
	 if (t.match(/ /g)) {
	 t = t.replace(/\s+/g, '-');
     //   document.getElementById('url').innerHTML = t2
     }
    document.getElementById("url").innerHTML = t;
    console.log(t);
    $('.access_url').val(t);
});
  </script>
  <script type="text/javascript">
    // add row
    var i = 1;
    $("#addRow").click(function () {
        ++i;
        var html = '';
        html += '<div id="inputFormRow">';
        html += '<div class="input-group mb-3">';
        html += '<input type="file" name="subimage['+i+']" class="form-control m-input" autocomplete="off">';
        html += '<div class="col-lg-3">';
        html += '<input type="number" name="sort['+i+']" class="form-control m-input" autocomplete="off" placeholder="Sort Number">'
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


//@sir  

function readURL(input) {
            console.log(input.files)
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#img')
                        .attr('src', e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        function readURLSubimg(input) {
            // var $obj = $(this);
            // console.log($obj.html());
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $ (input).parent().parent().parent().find('.sub_image').attr('src',e.target.result)
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
        $(function () {
            //image add and remove
            if ($(".multiple_img_list >div").length == 1){
                $('.more_img').show();
            }
            $('.multiple_img_list').on('click','.add_img',function () {
                var $obj = $(this).closest('.more_img').clone();
                // $obj.find("img").removeAttr("src");
                // $obj.find("input").val("");
                // $obj.end().insertAfter($(this).closest('.more_img'));
                // // find('input').val('').end().insertAfter($(this).closest('.more_img'));
                // if ($(".multiple_img_list >div").length != 1){
                //     $('.remove_img').show();
                // }
                $obj.find('input').val('').end().insertAfter($(this).closest('.more_img'));
                if ($(".multiple_img_list >div").length != 1){
                    $('.remove_img').show();
                }
            });
            $('.multiple_img_list').on('click','.remove_img',function () {
                if ($(".multiple_img_list >div").length > 1){
                    $(this).closest('.more_img').remove();
                }
                if ($(".multiple_img_list >div").length == 1){
                    $('.remove_img').hide();
                    $('.more_img').show();
                }
            });
            $('.multiple_img_list').on('keypress','#sort',function (e) {
                var keyCode = e.charCode;
                console.log(e.keyCode);
                // if ( (97 != backspace || keyCode ==space ) && (97 < zero || 97 > nine)) {
                if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) {
                    return false;
                }
            });
        });






</script>

</html>
