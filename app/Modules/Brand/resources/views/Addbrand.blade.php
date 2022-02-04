
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
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
     @include('header')
       @include('sidebar')
     {{-- @yield('content')  --}}
     <div class="content-wrapper">
      
      <div class="d-flex justify-content-center p-1">
<div class="col-md-8">
  <!-- general form elements -->
  <div class="card card-danger">
    <div class="card-header">
      <h3 class="card-title">Add Category</h3>
      <a href="{{ url('admin/dashboard') }}" class="btn btn-danger float-right"><p class="text-success font-weight-bold"><h5>&nbsp;<i class="fas fa-arrow-alt-circle-left fa-lg"></i></h5></a>
      <a href="{{ url('/admin/brands/brandlist') }}"  class="btn btn-danger float-right"><p class="text-success font-weight-bold"><h5>LIST &nbsp;<i class="fas fa-list"></i></p></h5></a>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

  

    <form method="POST" action="Addbrand">
      @csrf

      <div class="card-body">
        <div class="form-group">
          <label for="name">Category Name</label>
          <input type="text" class="form-control" name="name" id="brandname" placeholder="Enter Category Name">

              
          @error('name')
          <p style="color:red">{{ $message }} </p>
           @enderror
          <h5 id="namecheck"></h5>
        </div>

           </div>
      <!-- /.card-body -->

      <div class="card-footer " align="center">
        <button type="submit" class="btn btn-danger">Submit</button>
      </div>
    
    </form>
  </div>
      @if(session()->has('status'))

      <div class="alert alert-success">

         {{ session('status') }}
      </div>
      @endif
       

  </div>
      </div>
     </div>
    </div>
    


  {{-- edit_page_Jquery_link_is _below --}}
  <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> 

    @include('footer')

      
  </div>
{{-- validation  --}}


<script type="text/javascript">
  $(document).ready(function(){
        $('#namecheck').hide();
        var color_err = true;
        $('#brandname').keyup(function(){
               brandname_check();
  });
  function brandname_check(){
  var color_val = $('#brandname').val();


  if(color_val.length ==''){
  //    console.log("hello");
      $('#namecheck').show();
      $('#namecheck').html("** fill this filled");
      $('#namecheck').focus();
      $('#namecheck').css("color","red");
      color_err = false;
      return false;
  }
  else
  {
     $('#namecheck').hide();
  }
  var regex = /^[A-Za-z]+$/;
  if(!color_val.match(regex))
  {
      $('#namecheck').show();
      $('#namecheck').html("** Please input alphabet characters only");
      $('#namecheck').focus();
      $('#namecheck').css("color","red");
      color_err = false;
      return false;


  }
  else
  {
      $('#namecheck').hide();
  }
  if((color_val.length <3) ||(color_val.length >10)){

      $('#namecheck').show();
      $('#namecheck').html("** color name legth must be between 3 and 10");
      $('#namecheck').focus();
      $('#namecheck').css("color","red");
      color_err = false;
      return false;
  }
  else
  {
       $('#namecheck').hide();
  }
  }
   });

</script>










</body>
</html>