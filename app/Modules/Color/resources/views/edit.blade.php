
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
<div class="col-md-10">
  <!-- general form elements -->
  <div class="card card-danger">
    <div class="card-header">

      <h3 class="card-title">Edit Colors</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form method="POST" action="">
      @csrf
     {{-- @method('PUT'); --}}
      <div class="card-body">
        <div class="form-group">
          <label for="name">Color Name</label>
          <input type="text" class="form-control" name="name" value="{{ $colors->name }}">
        </div>

    </div>
      <!-- /.card-body -->

      <div class="card-footer " align="center">
        <button type="submit" class="btn btn-danger">Update</button>
      </div>
    </form></div>
  </div>
</div>
</div>
</div>

    @include('footer')

      
  </div>
</body>
</html>