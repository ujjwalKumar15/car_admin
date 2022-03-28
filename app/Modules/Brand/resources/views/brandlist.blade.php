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
                      </ol>
                    </div>
                </div>
            </div>
        </div>
 <div class="d-flex justify-content-center">
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-danger p-1">
                        <div class="card-header">
                            <h3 class="card-title">Categories</h3>
                            <a class="btn btn-danger float-right" href="{{ url('/admin/brands/trashbrand') }}"
                            role="button">Trash<i class="far fa-trash-alt"></i></a>
                        <a class="btn float-right" href="{{ url('/admin/brands/Addbrand') }}"
                            role="button">Add
                            <i class="fas fa-plus-circle"></i></i></a>
                        </div>
                      
                    </div>

                    <table id="myTable" class="table table-striped ">

                        <thead>

                            <tr>

                                <th class="text-center">Sr.No.</th>

                                <th>UserName</th>
                                <th>Category</th>
                                <th>Created Date</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>
                            <?php $count = 0; ?>
                            <tr>
                                @foreach ($brands as $brand)
                                    <td class="text-center">{{ $count += 1 }}</td>
                                    <td>{{ $brand->username }}</td>
                                    <td>{{ $brand->name }}</td>
                                    <td>{{ $brand->created_at }}</td>
                                    <td>
                                        @if ($brand->status == 'Y')
                                        <label class="switch">
                                            <input type="checkbox" data-id="{{ $brand->id }}"  class="toggle-class"{{ $brand->status ? 'checked' : '' }}>
                                            <div class="slider round"></div>
                                          </label>
                                          @endif

                                          @if ($brand->status == 'N')
                                        <label class="switch">
                                            <input type="checkbox" data-id="{{ $brand->id }}"  class="toggle-class"{{ $brand->status}}>
                                            <div class="slider round"></div>
                                          </label>
                                          @endif

                                    </td>


                                    <td>

                                        <a href="{{ url('/admin/brands/editbrand', $brand->id) }}"
                                            class=""><i class="fas fa-pencil-alt"></i></a>&nbsp;
                                        <a href="javascript:void(0);" onclick="delete_Question({{ $brand->id }})"><i
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
                            url: "{{url('/admin/brands/changebrandstatus')}}",
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
                            url: "{{ url('/admin/brands/completedUpdatee')}}",
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
            </script>
        @endsection
