
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
                    <div class="row" ng-app="">
                        <div class="col-md-12">
                            <label for="name">Name<span class="text-danger">*</span></label>
                            <input type="text" ng-model="name" class="form-control" id='amount' onKeyUp="javascript: replacetext('amount'); " >
                        <a href=" " > http//localhost/<span ng-bind="name"></span> </a>
                            <i class="fas fa-edit"></i>
                        </div>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                      <label for="inputcategory">Category<span class="text-danger">*</span></label>
                      <select id="inputcategory" class="form-control">
                        <option selected>Select Category</option>
                        <option>...</option>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputcolor">color<span class="text-danger">*</span></label>
                      <select id="inputcolor" class="form-control">
                        <option selected>Select Color</option>
                        <option>...</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                        <label for="inputPrice">Price<span class="text-danger">*</span></label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                          </div>
                          <input type="text" class="form-control" id="inlineFormInputGroup">
                        </div>
                    </div>
                </div>
    
                <!-- /.row -->
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <div class="form-group">
                            <label>Main Image<span class="text-danger">*</span></label>
                           <input type="file" class="form-control" name="image">
                          </div>
                    </div>
                    <div class="col-md-3">
                        <label for="inputupc">UPC<span class="text-danger">*</span></label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-tag"></i></div>
                          </div>
                          <input type="text" class="form-control" id="inlineFormInputGroup">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="inputstock">Stock<span class="text-danger">*</span></label>
                        <div class="input-group mb-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text"><i class="fas fa-layer-group"></i></div>
                          </div>
                          <input type="text" class="form-control" id="inlineFormInputGroup">
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-sm-12">
                        <!-- text input -->
                        {{-- <div class="form-group">
                          <label>Discription<span class="text-danger">*</span></label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="This Box has a Limit of 1000 Chars"></textarea>
                        </div> --}}
                        <label>Discription<span class="text-danger">*</span></label>
                        <div class="input-group mb-2">
    
                            <div class="input-group-prepend">
                              <div class="input-group-text">1000</i></div>
                            </div>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="This Box has a Limit of 1000 Chars"></textarea>
                          </div>
                    </div>
                    {{-- <div class="col-sm-6">
    
                        <div class="form-group">
                          <label>Main Image<span class="text-danger">*</span></label>
                         <input type="file" class="form-control" name="image">
                        </div>
                    </div> --}}
                </div>
            </div>
            </div>
          </div>
        </section>

   {{-- edit_page_Jquery_link_is _below --}}
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> 


    @include('footer')

      
  </div>

 
</body>

{{-- rplace by hypen --}}
<script type="text/javascript">

    function replacetext(i) {
    var val = document.getElementById(i).value;
    if (val.match(/ /g)) {
    val = val.replace(/\s+/g, '-');
    document.getElementById(i).value=val;
    }
    }
  
    </script>
  

</html>