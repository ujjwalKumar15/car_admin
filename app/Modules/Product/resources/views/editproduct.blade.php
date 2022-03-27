@extends('master')
@section('title')Product @endsection
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
                                        href="{{ url('/admin/products/listproduct') }}">Product</a>
                                </li>
                                <li class="breadcrumb-item"></li>

                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <section class="content">

                @if (session()->has('status'))
                    <div class="alert alert-success float-center">
                        {{ session('status') }}
                    </div>
                @endif
                <form method="post" id="form_try" action="{{ url('admin/products/editproduct/' . $product->id) }}"
                    enctype="multipart/form-data">


                    @csrf
                    <div class="container-fluid">
                        <div class="card card-danger ">
                            <div class="card-header">
                                <h3 class="card-title">Edit Product</h3>

                                         <a class="btn btn-danger bg-gradient-danger  btn-sm float-right "
                                        href="{{ url('/admin/products/listproduct') }}"><i class="fa fa-arrow-left"
                                            aria-hidden="true"></i> </a>&nbsp;


                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                    &nbsp;&nbsp;

                                </div>
                            </div>

                            <div class="card-body">
                                
                                <h6>The All Fields With Sysmbol <span class="text-danger">*</span>is Required</h6>
                                <div class="row">
                                    <input type="hidden" class="access_url" id="url">
                                    <div class="col-md-12">

                                        <label for="name">Name<span class="text-danger" id="Name_Error">*</span></label>
                                        <input type="text" class="form-control allowed_name"
                                            placeholder="Enter Product Name" id="replace"
                                            oninput="this.value = this.value.replace(/[^A-za-z0-9_\s]/g, '').replace(/(\..*)\./g, '$1');"
                                            value="{{ $product->name }}" name="name">
                                        <br>

                                        <a href="#"> http//localhost/<span id="url" name="url"></span></a><input type="text"
                                            class=" access_url text-primary border border-0" id="edit_url"
                                            value="{{ $product->url }}" name="url">


                                        @error('name')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>

                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-3">
                                        <label for="inputcategory">Category<span class="text-danger">*</span></label>
                                        <select id="inputcategory" name="brand_id" class="form-control" disabled>
                                            @foreach ($brands as $brand)
                                                <option selected>{{ $brand->bname }}</option>
                                                <option value="{{ $brand->bid }}">{{ $brand->bname }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="inputcolor">color<span class="text-danger">*</span></label>
                                        <select id="inputcolor" id="color_id" name="color_id" class="form-control">
                                            <option selected>Select Color</option>
                                            @foreach ($colors as $color)
                                                <option value="{{ $color->cid }}"
                                                    @if ($color->cid == $product->colorid) selected @endif>{{ $color->cname }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('color_id')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPrice">Price<span class="text-danger">*</span></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-rupee-sign"></i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter Product Price"
                                                name="price" value="{{ $product->price }}" id="price">
                                        </div>
                                        @error('price')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror

                                    </div>
                                </div>

                                <div class="form-row">

                                    <div class="col-md-3">
                                        <label for="inputupc">UPC<span class="text-danger">*</span></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-tag"></i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter Product Upc Number"
                                                name="upc" disabled value="{{ $product->upc }}" id="upc">
                                        </div>
                                        @error('upc')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputstock">Stock<span class="text-danger">*</span></label>
                                        <div class="input-group mb-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-layer-group"></i></div>
                                            </div>
                                            <input type="text" class="form-control" placeholder="Enter Product Stock"
                                                min="1" name="stock" value="{{ $product->quanty }}" id="stock">
                                        </div>
                                        @error('stock')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-sm-6">
                                        <label>description<span class="text-danger">*</span></label>
                                        <div class="input-group mb-2">

                                            <div class="input-group-prepend">
                                                <div class="input-group-text">1000</i></div>
                                            </div>
                                            <textarea class="form-control" name="description" rows="3"
                                                placeholder="This Box has a Limit of 1000 Chars">{{ $product->description }}</textarea>
                                        </div>
                                        @error('description')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-sm-6">
                                        <label>Main Image<span class="text-danger">*</span></label>
                                        <div class="form-group">

                                            <img src="{{ asset('storage/media/' . $product->image) }}"
                                                alt="Missing Image"
                                                style="height:100px; width:100px; border:1px green solid;">
                                            <input type="file" class="form-control" name="image" id="upload"
                                                accept="image/*">
                                        </div>
                                        @error('image')
                                            <p style="color:red">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <div class="multiple_img_list pb-3">
                                    <p>Select Multiple Images</p>
                                    @foreach ($images as $image)
                                        <div class="more_img">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <div class="form-group">
                                                                <input type="file" name="sub_img[]"
                                                                    onchange="readURLSubimg(this);" id="sub_img[]"
                                                                    class="form-control moreImgInp"
                                                                    data-iconname="fa fa-cloud-upload"
                                                                    data-buttonname="btn-secondary" accept="image/*" />
                                                                <input class="form-control" value="{{ $image->id }}"
                                                                    name="img_id[]" type="hidden" id="imag_id[]">
                                                                @error('sub_img[]')
                                                                    <p style="color:red">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <img alt="Product Image" id="sub_image"
                                                                src="{{ asset('storage/media/' . $image->product_images) }}"
                                                                class="img-thumbnail sub_image">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <input class="form-control" value="{{ $image->sort }}"
                                                            name="sort[]" type="text" id="sort" maxlength="2"
                                                            onkeypress="if(this.value.length==2);" placeholder="Sort Number"
                                                            id="{{ $image->id }}">
                                                    </div>
                                                    @error('sort[]')
                                                        <p style="color:red">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                                <div class="col-md-4">
                                                    <button name="add_img" id="add_img" type="button"
                                                        class="btn btn-success add_img"><i class="fa fa-plus-circle"
                                                            aria-hidden="true"></i> Add &nbsp;</button>
                                                    <button name="remove_img" id="{{ $image->id }}" type="button"
                                                        class="btn btn-danger remove_img"><i
                                                            class="fas fa-times-circle"></i>&nbsp;&nbsp;Remove</button>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="more_img" style="display:none">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="row">
                                                    <div class="col-md-10">
                                                        <div class="form-group">
                                                            <input type="file" name="sub_img[]"
                                                                class="form-control @error('sub_img') is-invalid @enderror"
                                                                data-iconname="fa fa-cloud-upload"
                                                                data-buttonname="btn-secondary" accept="image/*" />
                                                            @error('sub_img')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2">
                                                        <img id="sub_image" class="img-thumbnail sub_image">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input class="form-control @error('sort') is-invalid @enderror"
                                                        value="" name="sort[]" type="text" id="sort" maxlength="2"
                                                        onkeypress="if(this.value.length==2);" placeholder="Sort Number">
                                                    @error('sort')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <button name="add_img" id="add_img" type="button"
                                                    class="  btn btn-success add_img"><i class="fa fa-plus-circle"
                                                        aria-hidden="true"></i> Add &nbsp;</button>
                                                <button name="remove_img" id="remove_img" type="button"
                                                    class="btn btn-danger remove_img"><i class="fas fa-times-circle"
                                                        style="display: none"></i>&nbsp;&nbsp;Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="from-row">
                                    <div align="center">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </form>
            </section>
        @endsection
    </div>
    @section('scripts')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        <script type="text/javascript">
            $('#replace').keyup(function() {
                var dInput = this.value;
                var t = dInput.toLowerCase();
                if (t.match(/ /g)) {
                    t = t.replace(/\s+/g, '-');
                }
                document.getElementById("url").innerHTML = t;
                console.log(t);
                $('.access_url').val(t);
            });

            $(function() {
                $(".allowed_name,#edit_url").keypress(function(e) {
                    var keyCode = e.keyCode || e.which;
                    $("#url").html("");
                    var regex = /^[0-9a-zA-Z\s]+$/;
                    var isValid = regex.test(String.fromCharCode(keyCode));
                    if (!isValid) {
                        $("#url").html(" Special Characters Not Allowed.");
                    }

                    return isValid;
                });
            });

            jQuery.validator.addMethod("pricevalidate", function(value, element) {
                return this.optional(element) || /^((?:\d|\d{1,3}(?:,\d{3})){0,6})(?:\.\d{1,2}?)?$/.test(value);
            }, "The price must be in this 999999.999 Digit");
            $.validator.addMethod('filesize', function(value, element, param) {
                return this.optional(element) || (element.files[0].size <= param)
            }, 'File size must be less than 5mb');

            $("#form_try").validate({
                rules: {
                    name: {
                        required: true,
                    },
                    // url: {
                    //     required: true,
                    //     remote: {
                    //         url: '/admin/products/checkurl',
                    //         type: "GET",
                    //         data: {
                    //             colorname: function() {
                    //                 return $("#url").val();
                    //             }
                    //         },
                    //     }
                    // },
                    category_id: {
                        required: true,

                    },
                    color_id: {
                        required: true,
                    },
                    price: {
                        required: true,
                        // number: true,
                        // pricevalidate: true,
                    },

                    upc: {
                        required: true,
                        number: true,
                        minlength: 12,
                        maxlength: 12,
                        remote: {
                            url: "{{ url('/admin/products/uniqueproduct') }}",
                            type: "GET",
                            data: {
                                colorname: function() {
                                    return $("#upc").val();
                                }
                            },
                        }
                    },

                    stock: {
                        required: true,
                        number: true,
                    },

                    image: {
                        //  required: true,
                        //   extension: "jpg,jpeg,png",
                        //   filesize: 5,
                    },

                    description: {
                        maxlength: 1000
                    },

                    // 'subimage[]':{
                    //   required: true,
                    //   extension: "jpg,jpeg,png",
                    //   filesize: 5,

                    //  },


                },

                messages: {
                    name: {
                        required: 'The name field is required.',
                    },
                    price: {
                        required: 'The price field is required.',
                        // number: "The price must be in number",

                    },
                    stock: {
                        required: 'The stock field is required!!',
                        number: 'The stock must be in Number',

                    },

                    upc: {
                        required: "The upc field is required",
                        number: "The upc must be in number",
                        remote: 'The upc has already been taken.',
                        minlength: "The upc may not be less than 12 Digit",
                        maxlength: "The upc may not be grater than 12 Digit"


                    },
                    errorPlacement: function(error, element) {
                        error.appendTo(element.parents('.form-group'));
                    },

                    submitHandler: function(form) {
                        form.submit();
                    }
                },
            });

            document.getElementById('upload').onfocusout = function() {
                var image = document.getElementById('upload').value;
                if (image != '') {
                    var checkimg = image.toLowerCase();
                    if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG)$/)) {
                        alert("Please Select jpg,png File");
                        document.getElementById('upload').value = "";

                    }
                    var image = document.getElementById('upload');
                    var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2);
                    if (size > 2) {
                        alert("Please Select Size Less Than 2 MB");
                        document.getElementById('upload').value = "";

                    }
                }

            }

            document.getElementById('sub_img[]').onfocusout = function() {
                var image = document.getElementById('sub_img[]').value;
                if (image != '') {
                    var checkimg = image.toLowerCase();
                    if (!checkimg.match(/(\.jpg|\.png|\.JPG|\.PNG|\.jpeg|\.JPEG)$/)) {
                        alert("Please Select jpg,png File");
                        document.getElementById('sub_imag[]').value = "";

                    }
                    var image = document.getElementById('sub_img[]');
                    var size = parseFloat(image.files[0].size / (1024 * 1024)).toFixed(2);
                    if (size > 2) {
                        alert("Please Select Size Less Than 2 MB");
                        document.getElementById('sub_img[]').value = "";

                    }
                }

            }

            function readURL(input) {
                console.log(input.files)
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#img')
                            .attr('src', e.target.result)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

            function readURLSubimg(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $(input).parent().parent().parent().find('.sub_image').attr('src', e.target.result)
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(function() {
                if ($(".multiple_img_list >div").length == 1) {
                    $('.more_img').show();
                }
                $('.multiple_img_list').on('click', '.add_img', function() {
                    var $obj = $(this).closest('.more_img').clone();
                    $obj.find('input').val('').end().insertAfter($(this).closest('.more_img'));
                    if ($(".multiple_img_list >div").length != 1) {
                        $('.remove_img').show();
                    }
                });
                $('.multiple_img_list').on('click', '.remove_img', function() {
                    if ($(".multiple_img_list >div").length > 1) {
                        $(this).closest('.more_img').remove();
                    }
                    if ($(".multiple_img_list >div").length == 1) {
                        $('.remove_img').hide();
                        $('.more_img').show();
                    }
                });
                $('.multiple_img_list').on('keypress', '#sort', function(e) {
                    var keyCode = e.charCode;
                    console.log(e.keyCode);
                    if ((keyCode != 8 || keyCode == 32) && (keyCode < 48 || keyCode > 57)) {
                        return false;
                    }
                });
            });
        </script>
    @endsection
