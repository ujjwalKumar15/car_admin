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
  {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script> --}}

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

            <div class="d-flex justify-content-center">
    <div class="col-md-11">
        <!-- general form elements -->
        <div class="card card-danger p-1">
          <div class="card-header">
            <h3 class="card-title">Categories</h3>
          </div>
          <div class="text-center mt-2 mb-2 p-1">
      <a class="btn btn-danger float-right" href="{{ url('/admin/brands/trashbrand') }}" role="button">Trash<i class="far fa-trash-alt"></i></a>
     <a class="btn btn-success float-right" href="{{ url('/admin/brands/Addbrand') }}" role="button">Add
             <i class="fas fa-plus-circle"></i></i></a></div>
          </div>
          
        <table id="myTable" class="table table-striped ">

            <thead>

               <tr>

                  <th class="text-center">Sr.No.</th>

                  <th>UserName</th>
                  <th>Category</th>
                  <th>Status</th>
                  <th>Action</th>

               </tr> 

            </thead>

            <tbody>
                 <?php $count=0; ?>
                <tr>
                  @foreach($brands as $brand)
                  <td class="text-center">{{ $count+=1 }}</td>
                  <td>{{ $brand->username }}</td>
                  <td>{{ $brand->name }}</td>
                  <td>
                    {{-- <input data-id="{{$col->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" checked> --}}
                  @if($brand->status=='Y') 
                    <input data-id="{{$brand->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" checked }}>

                 @endif

                 @if($brand->status=='N') 
                 <input data-id="{{$brand->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Active" data-off="InActive" }}>

              @endif

                  </td>
                                  

                     <td>

                        <a href="{{ url('/admin/brands/editbrand',$brand->id) }}" class=""><i class="fas fa-pencil-alt"></i></a>&nbsp;
                        <a href="javascript:void(0);" onclick="delete_Question({{$brand->id}})"><i class="fas fa-trash-alt"></i></a>                      
                                          
                      </td>
                  </tr>
               @endforeach
            </tbody>
        </table>
    </div>
      
</div> 
  @include('footer') 
</body>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>


<script>
// status changed  with Y and N 
  $(function() {

    $('.toggle-class').change(function() {

        var status = $(this).prop('checked') == true ? 'Y' : 'N'; 

        var id = $(this).data('id'); 

         

        $.ajax({

            type: "GET",

            dataType: "json",

            url: '/admin/brands/changebrandstatus',

            data: {'status': status, 'id': id},

            success: function(data){
             console.log(data.success)

            }

        });

    })

  })
</script>


{{-- Delete_Status Changed  status value With T  --}}

{{-- delete _ Status --}}
<script>

  function delete_Question(id){
          if(confirm('are your sure you want to delete !!!! ?')){
          jQuery.ajax({
              url:'/admin/brands/completedUpdatee',
              type:'GET',
              data:{'id':id},
              success:function(result){
                  // jQuery('#check_delete'+id).hide();
              console.log("Status Updated");
              location.reload();
              }
          });
      }
      }
  
  </script>
  
  
  

{{-- DataTable_ --}}
<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
    } );
  
    
</script>
    
</html>