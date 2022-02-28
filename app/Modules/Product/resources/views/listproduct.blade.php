@extends('master')
@section('content')
    <div class="content-wrapper">
        <div class="d-flex justify-content-center">
            <div class="col-md-10">
                <!-- general form elements -->
                <div class="card card-danger p-1">
                    <div class="card-header">
                        <h3 class="card-title">List Products</h3>
                    </div>
                    <div class="text-center mt-2 mb-2 p-1">
                        <a class="btn btn-danger float-right" href="{{ url('/admin/products/trashproduct') }}"
                            role="button">Trash<i class="far fa-trash-alt"></i></a>
                        <a class="btn btn-success float-right" href="{{ url('/admin/products/addproduct') }}"
                            role="button">Add
                            <i class="fas fa-plus-circle"></i></i></a>
                    </div>
                </div>
                <table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Images</th>
                            <th>Product Name</th>
                            <th>UPC</th>
                            <th>URL</th>
                            <th>Price</th>
                            <th>Quanty</th>
                            <th>Color</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @php  $count=0; @endphp
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $count += 1 }}</td>
                                <td><img src="{{ asset('storage/media/' . $product->image) }}" height="50" width="100" />
                                </td>
                                <td> {{ $product->name }}</td>
                                <td>{{ $product->upc }}</td>
                                <td>{{ $product->url }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quanty }}</td>
                                <td>{{ $product->cname }}</td>
                                <td>{{ $product->bname }}</td>
                                <td>
                                    @if ($product->status == 'Y')
                                        <input data-id="{{ $product->id }}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="Active" data-off="InActive" checked>
                                    @endif
                                    @if ($product->status == 'N')
                                        <input data-id="{{ $product->id }}" class="toggle-class" type="checkbox"
                                            data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                            data-on="Active" data-off="InActive">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('/admin/products/editproduct', $product->id) }}"
                                        class="fas fa-pencil-alt"></a>
                                    <a href="javascript:void(0);" onclick="delete_status({{ $product->id }})"><i
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
                        url: '/admin/products/ChangeStatus',
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

            function delete_status(id) {
                if (confirm('are your sure you want to delete !!!! ?')) {
                    jQuery.ajax({
                        url: '/admin/products/delete',
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
