@extends('master')
@section('title')Color @endsection
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
                                        href="{{ url('/admin/colors/list') }}">Color</a>
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
                            <h3 class="card-title">List Colors</h3>
                            <a href="{{ url('/admin/colors/list') }}" class="btn btn-danger float-right">
                                <h5> <i class="fas fa-arrow-alt-circle-left fa-lg"></i></h5>
                            </a>
                        </div>
                    </div>
                    <table id="myTable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>UserName</th>
                                <th>ColorName</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($colors as $col)
                                <tr>
                                    <td>{{ $col->id }}</td>
                                    <td>{{ $col->username }}</td>
                                    <td>{{ $col->name }}</td>
                                    <td>
                                        <button type="submit" class="btn btn-primary"
                                            onclick="restore_status({{ $col->id }})">Restore &nbsp;<i
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
                        url: "{{ url('/admin/colors/completedUpdated') }}",
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
