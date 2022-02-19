<!DOCTYPE html>

<html>

<head>

    <title>AdminLTE 3 | Dashboard</title>


  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css')}}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
    
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  /> --}}

    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

</head>




<body class="hold-transition sidebar-mini">
    <div class="wrapper">
      @include('header')
      @include('sidebar')

      
    <div class="content-wrapper">

        <div class="d-flex justify-content-center p-1">
        <div class="col-md-10">
        <!-- general form elements -->
        <div class="card card-danger">
        <div class="card-header">
        <h3 class="card-title">List Products</h3>
        <a href="{{ url('/admin/products/listproduct') }}" class="btn btn-danger float-right"><h5><i class="fas fa-arrow-alt-circle-left fa-lg"></i></h5></a>
        </div>
      
        </div>
        
        <table id="myTable" class="table table-striped">
        
        <thead>
        
           <tr>
        
              <th>Sr.No</th>
        
              <th>Images</th>
              <th>Product</th>
              <th>UPC</th>
              <th>URL</th>
              <th>Price</th>
              <th>Quanty</th>
              <th>Color</th>
              <th>Category</th>
              <th>Action</th>
        
           </tr> 
        
        </thead>
        
        <tbody>
            @php $count=0;   @endphp
           @foreach($products as $product)
              <tr> 
                 <td class="text-center" >{{$count+=1 }}</td>
                 <td><img src="{{asset('storage/media/'.$product->image)}}" height="70" weight="100" /></td>
                 <td>{{ $product->name }}</td>
                 <td>{{ $product->upc }}</td>
                 <td>{{ $product->url }}</td>
                 <td>{{ $product->price }}</td>
                 <td>{{ $product->quanty }}</td>
                 <td>{{ $product->bname }}</td>
                 <td>{{ $product->cname }}</td>
            <td>
             <button type="submit" class="btn btn-primary"  onclick="restore_status({{$product->id}})">Restore &nbsp;<i class="fas fa-trash-restore"></i></button>
              <a class="btn btn-danger" href="{{ url('/admin/brands/delete',$product->id) }}" role="button">Delete &nbsp;<i class="far fa-trash-alt"></i></a>
              </td>
              </tr>
           @endforeach
        </tbody>
        </table>
        </div>
        
        </div>

          {{-- edit_page_Jquery_link_is _below --}}
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script> 

        @include('footer')
    </div>
    
        </body>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>
        
        
        
        {{-- Restore _ Status --}}
        <script>
        
        function restore_status(id){
        if(confirm('are your sure!!  you want to Restore?')){
        jQuery.ajax({
        url:'/admin/products/RestoreTrash',
        type:'GET',
        data:{'id':id},
        success:function(result){
            // jQuery('#check_delete'+id).hide();
        console.log("Status Changed successfully ");
        // windows.location.relo
        location.reload();
        }
        });
        }
        }
        
        
        
        
        
        
        </script>
        
        
        
        <script>
        $(document).ready( function () {
        $('#myTable').DataTable();
        } );
        
        $(document).ready(function(){
        
        $('.toggle-btn').click(function() {
        $(this).toggleClass('active').siblings().removeClass('active');
        });
        
        });
        </script>

      
</html>