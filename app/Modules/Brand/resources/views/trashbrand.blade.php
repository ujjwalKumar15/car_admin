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
                                <li class="breadcrumb-item">Trash</li>

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center p-1">
                <div class="col-md-12">
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Categories</h3>
                            <a href="{{ url('/admin/brands/brandlist') }}" class="btn btn-danger float-right">
                                <h5><i class="fas fa-arrow-alt-circle-left fa-lg"></i></h5>
                            </a>
                        </div>
                    </div>
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>UserName</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($brands as $brand)
                                <tr>
                                    <td>{{ $brand->id }}</td>
                                    <td>{{ $brand->username }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary"
                                            onclick="restore_status({{ $brand->id }})">Restore &nbsp;<i
                                                class="fas fa-trash-restore"></i></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
    @section('scripts')
        <script>
            function restore_status(id) {
                if (confirm('are your sure!!  you want to Restore?')) {
                    jQuery.ajax({
                        url: "{{ url('/admin/brands/getrestore') }}",
                        type: 'GET',
                        data: {
                            'id': id
                        },
                        success: function(result) {
                            console.log("Status Changed successfully ");
                            location.reload();
                        }
                    });
                }
            }

            $(document).ready(function() {
                $('#myTable').DataTable();
            });
            $(document).ready(function() {
                $('.toggle-btn').click(function() {
                    $(this).toggleClass('active').siblings().removeClass('active');
                });
            });
        </script>
    @endsection
