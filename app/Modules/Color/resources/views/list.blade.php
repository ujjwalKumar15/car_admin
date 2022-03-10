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

                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-danger p-1">
                        <div class="card-header">
                            <h3 class="card-title">List Colors</h3>
                        </div>
                        <div class="text-center mt-2 mb-2 p-1">
                            <a class="btn btn-danger float-right" href="{{ url('/admin/colors/trash') }}"
                                role="button">Trash<i class="far fa-trash-alt"></i></a>
                            <a class="btn btn-success float-right" href="{{ url('/admin/colors/Addcolor') }}"
                                role="button">Add
                                <i class="fas fa-plus-circle"></i></i></a>
                        </div>
                    </div>
                    <table id="myTable" class="table table-striped ">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>UserName</th>
                                <th>ColorName</th>
                                <th>Status</th>
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
                                        @if ($col->status == 'Y')
                                            <input data-id="{{ $col->id }}" class="toggle-class" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-on="Active" data-off="InActive" checked>
                                        @endif
                                        @if ($col->status == 'N')
                                            <input data-id="{{ $col->id }}" class="toggle-class" type="checkbox"
                                                data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                data-on="Active" data-off="InActive">
                                        @endif
                                    </td>
                                    <td>

                                        <a href="{{ url('/admin/colors/edit', $col->id) }}" class=""><i
                                                class="fas fa-pencil-alt"></i></a>&nbsp;
                                        <a href="javascript:void(0);" onclick="delete_Question({{ $col->id }})"><i
                                                class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endsection
        @section('scripts')
            <script>
                $(function() {
                    $('.toggle-class').change(function() {
                        var status = $(this).prop('checked') == true ? 'Y' : 'N';
                        var id = $(this).data('id');
                        $.ajax({
                            type: "GET",
                            dataType: "json",
                            url: '/admin/colors/changeStatus',
                            data: {
                                'status': status,
                                'id': id
                            },
                            success: function(data) {
                                console.log(data.success)
                            }

                        });

                    })

                })

                function delete_Question(id) {
                    if (confirm('are your sure you want to delete !!!! ?')) {
                        jQuery.ajax({
                            url: '/admin/colors/completedUpdate',
                            type: 'GET',
                            data: {
                                'id': id
                            },
                            success: function(result) {
                                // jQuery('#check_delete'+id).hide();
                                console.log("Status Updated");
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
