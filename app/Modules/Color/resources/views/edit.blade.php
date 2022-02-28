@extends('master')
@section('content')
    <div class="wrapper">

        <div class="content-wrapper">

            <div class="d-flex justify-content-center p-1">
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-danger">
                        <div class="card-header">

                            <h3 class="card-title">Edit Colors</h3>
                            <a href="{{ url('/admin/colors/list') }}" class="btn btn-danger float-right">
                                <h5><i class="fas fa-arrow-alt-circle-left fa-lg"></i></h5>
                            </a>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="POST" id="form_submit" action="">
                            @csrf
                            {{-- @method('PUT'); --}}
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Color Name</label>

                                    <input type="text" class="form-control" name="name" id="colorname"
                                        value="{{ $colors->name }}">
                                    <h5 id="colorcheck"></h5>

                                    @error('name')
                                        <p style="color: red">{{ $message }}</p>
                                    @enderror

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer " align="center">
                                <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </form>
                    </div>

                    @if (session()->has('status'))
                        <div class="alert alert-success">

                            {{ session('status') }}

                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script type="text/javascript">
        $("#form_submit").validate({
                         rules: {
                             name: {
                                 required: true,
                             },
                                
                             
                         },
                         messages:{
                             name:{
                                 required:"The Name field is Required!!",
                                
     
     
                             }
     
                         },
     
     
                     });
                      
          </script>
@endsection
