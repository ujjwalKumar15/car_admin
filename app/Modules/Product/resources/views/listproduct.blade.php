@extends('master')
@section('title')Product @endsection
@section('content')
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
                                    href="{{ url('/admin/products/listproduct') }}">Product</a>
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
                        <h3 class="card-title">List Products</h3>
                        <a class="btn btn-danger float-right" href="{{ url('/admin/products/trashproduct') }}"
                            role="button">Trash<i class="far fa-trash-alt"></i></a>
                        <a class="btn  float-right" href="{{ url('/admin/products/addproduct') }}"
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
                            <th>Created Date</th>
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
                                <td><a href="{{ url('/products', $product->url) }}"> {{ $product->url }}</td></a>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quanty }}</td>
                                <td>{{ $product->cname }}</td>
                                <td>{{ $product->bname }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    @if ($product->status == 'Y')
                                    <label class="switch">
                                        <input type="checkbox" data-id="{{ $product->id }}"  class="toggle-class"{{ $product->status ? 'checked' : '' }}>
                                        <div class="slider round"></div>
                                      </label>
                                      @endif

                                      @if ($product->status == 'N')
                                    <label class="switch">
                                        <input type="checkbox" data-id="{{ $product->id }}"  class="toggle-class"{{ $product->status}}>
                                        <div class="slider round"></div>
                                      </label>
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
                        url: "{{ url('/admin/products/ChangeStatus') }}",
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
                        url: "{{ url('/admin/products/delete') }}",
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
