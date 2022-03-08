fil@extends('master')
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
                                <li class="breadcrumb-item">Add</li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center p-1">
                <div class="col-md-8">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Add Category</h3>
                            <a href="{{ url('admin/dashboard') }}" class="btn btn-danger float-right">
                                <p class="text-success font-weight-bold">
                                    <h5>&nbsp;<i class="fas fa-arrow-alt-circle-left fa-lg"></i></h5>
                            </a>
                            <a href="{{ url('/admin/brands/brandlist') }}" class="btn btn-danger float-right">
                                <p class="text-success font-weight-bold">
                                    <h5>LIST &nbsp;<i class="fas fa-list"></i>
                                </p>
                                </h5>
                            </a>
                        </div>
                        <form method="POST" action="/admin/brands/Addbrand" id="form_validation">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" class="form-control" name="name" id="brandname"
                                        placeholder="Enter Category Name">
                                    @error('name')
                                        <p style="color:red">{{ $message }} </p>
                                    @enderror
                                    <h5 id="namecheck"></h5>
                                </div>
                            </div>

                            <div class="card-footer " align="center">
                                <button type="submit" class="btn btn-danger">Submit</button>
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
                    remote: {
                        url: '/admin/brands/uniquename',
                        type: "GET",
                        Data: {
                            colorname: function() {

                                return $("#name").val();

                            }
                        }



                    },

                },
            },

            messages: {

                name: {
                    required: "Name field is required",
                    remote: "The Name has already been taken!!!",
                },

            },

        });
    </script>
@endsection
