@extends('master')
@section('title')Brands @endsection
@section('content')
    <div class="wrapper">

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active"><a href="{{ url('/admin/dashboard') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active"><a
                                        href="{{ url('admin/brands/brandlist') }}">Brand</a>
                                </li>
                                <li class="breadcrumb-item">Edit</li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center p-1">
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">

                            <h3 class="card-title">Edit Category</h3>
                            <a href="{{ url('/admin/brands/brandlist') }}" class="btn btn-danger float-right">
                                <h5><i class="fas fa-arrow-alt-circle-left fa-lg"></i> </h5>
                            </a>
                        </div>
                        <form method="POST" id="form_validation" action="">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $brand->name }}">

                                    @error('name')
                                        <p style="color:red">{{ $message }} </p>
                                    @enderror
                                    <h5 id="namecheck"></h5>
                                </div>
                            </div>
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
        $("#form_validation").validate({
            rules: {
                name: {

                    required: true,
                    minlength:3,
                    maxlength:10,


                },
            },

            messages: {

                name: {
                    required: "Name field is required",
                    minlength: "The brand Name should be 3  characters ",
                    maxlength: "The brand name should  not be grater than 10 characters"
                },

            },

        });
    </script>
@endsection
