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
                            <li class="breadcrumb-item">Trash</li>

                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-center p-1">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">List Products</h3>
                        <a href="{{ url('/admin/products/listproduct') }}" class="btn btn-danger float-right">
                            <h5><i class="fas fa-arrow-alt-circle-left fa-lg"></i></h5>
                        </a>
                    </div>
                </div>
                <table id="myTable" class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Images</th>
                            <th>Product</th>
                            <th>UPC</th>
                            <th>URL</th>
                            <th>Price</th>
                            <th>Quanty</th>
                            <th>Color</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $count=0;   @endphp
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $count += 1 }}</td>
                                <td><img src="{{ asset('storage/media/' . $product->image) }}" height="70" weight="100" />
                                </td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->upc }}</td>
                                <td>{{ $product->url }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->quanty }}</td>
                                <td>{{ $product->bname }}</td>
                                <td>{{ $product->cname }}</td>
                                <td>
                                    <button type="submit" class="btn btn-primary"
                                        onclick="restore_status({{ $product->id }})">Restore &nbsp;<i
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
                    url: "{{ url('/admin/products/RestoreTrash') }}",
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
