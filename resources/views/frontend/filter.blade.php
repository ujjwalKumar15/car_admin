@extends('frontend.common')
@section('content')
    <div class="main-container col2-left-layout ">
        <div class="breadcrumbs">
            <div class="container">
                <ul>
                    <li class="home"> <a href="{{ url('/') }}" title="Go to Home Page">Home</a></li>
                    <li class="category4"> <strong>Products</strong></li>
                </ul>
            </div>
        </div>
        <!--- .breadcrumbs-->
        <div class="container">
            <div class="main">
                <div class="row">
                    <div class="col-left sidebar col-lg-3 col-md-3 col-sm-3 left-color color">

                        <div class="block block-layered-nav block-layered-nav--no-filters">
                            <div class="block-title"> <strong><span>Shop By</span></strong></div>
                            <div class="block-content toggle-content">
                                <p class="block-subtitle block-subtitle--filter">Filter</p>
                                <dl id="narrow-by-list">
                                    <dt class="even">By Price</dt>
                                    <dd class="even">
                                        <div class="slider-ui-wrap">
                                            <div id="price-range" class="slider-ui" slider-min="30000"
                                                slider-max="200000" slider-min-start="30000" slider-max-start="200000">
                                            </div>
                                        </div>
                                        <form action="" class="price-range-form" method="GET">
                                            @csrf
                                            Min &nbsp;₹<input type="text" class="range_value range_value_min"
                                                target="#price-range" name="minimum" id="minimum" />
                                            -
                                            ₹<input type="text" class="range_value range_value_max" target="#price-range"
                                                name="maximum" id="maximum" /> Max &nbsp; <br><br>
                                            <div class="text-right">
                                                <input type="submit" class="btn-submit text-center" id="onsubmit"
                                                    value="ok">


                                            </div>
                                        </form>
                                    </dd>
                                    <dt class="odd">By Brands</dt><br>
                                    <dd class="odd">
                                        @foreach ($products as $product)
                                            <ul style="" class="nav-accordion font-weight-normal">
                                                <input type="checkbox" class="level0 level-top"><a href="#"
                                                    class="level-top"><span>&nbsp;{{ $product->name }}</span></a><br><br><br>

                                            </ul>
                                        @endforeach
                                    </dd>
                                    <dt class="even">By Colors</dt>
                                    <dd class="even">
                                        <ol class="configurable-swatch-list">
                                            @foreach ($colors as $color)
                                                <li> <a href="#" class="swatch-link has-image">
                                                        <input type="checkbox"> <span
                                                            class="count">{{ $color->name }}</span> </a></li>
                                            @endforeach
                                        </ol>

                                </dl>
                            </div>
                        </div>
                        <!--- .block-layered-nav-->

                        <div class="magicproduct_active magicproduct mage-custom">

                            <div class="content-products" data-margin="30" data-slider="null"
                                data-options='{"480":"1","640":"1","768":"1","992":"1","993":"1"}'>
                                <div class="mage-magictabs mc-saleproduct">

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--- .toolbar-->
                    <div class="col-main col-lg-9 col-md-9 col-sm-9 col-xs-12 content-color color product-grid"
                        id="product-grid">
                        <div class="page-title category-title">
                            <h1>Men</h1>
                        </div>
                        <p class="category-image"><img src="assets/images/categories_grid_1.jpg" alt="Men" title="Men">
                        </p>
                        <div class="category-products grid-display" id="grid-display">
                            <div class="toolbar">
                                <div class="sorter">
                                    <p class="view-mode"> <label>View as:</label> <a title="Grid" id="grid_view"
                                            class="grid active"> <i class="icon-grid icons"></i> </a>
                                        <a id="list_view" title="List" class="redirectjs list"> <i
                                                class="icon-list icons"></i>
                                        </a>
                                    </p>
                                    <div class="sort-by">
                                        <label>Sort By</label>
                                        <select>
                                            <option value="position" selected="selected"> Position</option>
                                            <option value="name"> Name</option>
                                            <option value="price"> Price</option>
                                        </select>
                                        <a href="#" title="Set Descending Direction"><img
                                                src="assets/images/i_asc_arrow.gif" alt="Set Descending Direction"
                                                class="v-middle"></a>
                                    </div>
                                    <div class="limiter">
                                        <label>Show</label>
                                        <select>
                                            <option value="9" selected="selected"> 9</option>
                                            <option value="12"> 12</option>
                                            <option value="15"> 15</option>
                                        </select>
                                    </div>
                                    <div class="pager">
                                        <div class="pages">
                                            <strong>Page:</strong>
                                            <ol>
                                                <li class="current">1</li>
                                                <li><a href="#">2</a></li>
                                                <li class="bor-none"> <a class="next i-next" href="#" title="Next">
                                                        <i class="fa fa-angle-right">&nbsp;</i> </a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </div>





                            <!--- .content-->
                            <div id="content">
                                <ul class="products-grid row products-grid--max-3-col last odd">
                                    @foreach ($products as $product)
                                        <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6 col-mobile-12 item">
                                            <div class="category-products-grid">
                                                <div class="images-container">
                                                    <div class="product-hover">
                                                        {{-- <span class="sticker top-left"><span class="labelnew">New</span></span> --}}
                                                        <a href="{{ url('products', $product->url) }}"
                                                            title="Configurable Product" class="product-image">
                                                            <img id="product-collection-image-8" class="img-responsive"
                                                                src="{{ asset('storage/media/' . $product->image) }}"
                                                                alts="" height="355" width="278">
                                                            <span class="product-img-back"> <img class="img-responsive"
                                                                    src="{{ asset('storage/media/' . $product->image) }}"
                                                                    alt="" height="355" width="278"> </span>
                                                        </a>
                                                    </div>
                                                    <div class="actions-no hover-box">
                                                        <div class="actions">
                                                            <button type="button" title="Add to Cart"
                                                                class="button btn-cart pull-left"><span><i
                                                                        class="icon-handbag icons"></i><span>Add to
                                                                        Cart</span></span></button>
                                                            <ul class="add-to-links pull-left">
                                                                <li class="pull-left"><a href="#"
                                                                        title="Add to Wishlist" class="link-wishlist"><i
                                                                            class="icon-heart icons"></i>Add to
                                                                        Wishlist</a></li>
                                                                <li class="pull-left"><a href="#"
                                                                        title="Add to Compare" class="link-compare"><i
                                                                            class="icon-bar-chart icons"></i>Add to
                                                                        Compare</a></li>
                                                                <li class="link-view pull-left"> <a title="Quick View"
                                                                        href="#" class="link-quickview"><i
                                                                            class="icon-magnifier icons"></i>Quick
                                                                        View</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-info products-textlink clearfix">

                                                    <h2 class="product-name"><a href="#"
                                                            title="Configurable Product">{{ $product->name }}</a></h2>
                                                    <ul class="configurable-swatch-list configurable-swatch-color clearfix">
                                                        <li class="option-blue is-media"> <a href="javascript:void(0)"
                                                                name="blue" class="swatch-link swatch-link-92 has-image"
                                                                title="blue"> <span class="swatch-label"> </span> </a>
                                                        </li>
                                                        <li class="option-red is-media"> <a href="javascript:void(0)"
                                                                name="red" class="swatch-link swatch-link-92 has-image"
                                                                title="red"> <span class="swatch-label">
                                                                </span> </a></li>
                                                    </ul>
                                                    <div class="price-box"> <span class="regular-price"> <span
                                                                class="price">₹{{ $product->price }}</span>
                                                        </span></div>
                                                    <div class="ratings">
                                                        <div class="rating-box">
                                                            <div class="rating" style="width:80%"></div>
                                                        </div>
                                                        <span class="amount"><a href="#">1 Review(s)</a></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <!--- .products-grid-->
                            <div class="page-nav-bottom">
                                <div class="left">Items 13 to 24 of 38 total</div>
                                <div class="right">
                                    <ul class="page-nav-category">
                                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a class="selected" href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <!--- .page-nav-bottom-->
                        </div>
                        <!--- .category-products-->
                    </div>
                    <!--- .col-main-->
                </div>
                <!--- .row-->
            </div>
            <!--- .main-->
        </div>
        <!--- .container-->
    </div>
@endsection

@section('custom_scripts')
    <script>
        // function save() {

        //     var a = document.getElementById('minimum').value;
        //     localStorage.setItem("min", a);
        //     var b = document.getElementById('maximum').value;
        //     localStorage.setItem("max", b);
        // }

        // function displaylist() {
        //     var minimum = document.getElementById("minimum");
        //     var maximum = document.getElementById("maximum");
        //     minimum.value = localStorage.getItem("min");
        //     maximum.value = localStorage.getItem("max");

        // }

             
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery("#onsubmit").click(function(e) {
                e.preventDefault();
                var minimum = jQuery("#minimum").val();
                var maximum = jQuery("#maximum").val();
                jQuery.ajax({
                    url:"/filter/price",
                    type:'GET',
                    datatype: "json",
                    data: {

                        minimum: minimum,
                        maximum: maximum,

                    },
                    success: function(data) {
                        jQuery('#content').html(data);
                      //  alert(data);
                    },
                
                });
            });

        jQuery(document).ready(function($) {
            $('#grid_view').on("click", function() {
                $('#grid_view').removeClass('redirectjs list').addClass('grid active');
                $('#list_view').removeClass('grid active').addClass('redirectjs list');
                $.ajax({
                    url: "/products/grid",
                    type: "GET",
                    success: function(data) {
                        $("#content").html(data);
                    }

                });
            })
            $('#list_view').on("click", function() {
                $('#list_view').removeClass('redirectjs list').addClass('grid active');
                $('#grid_view').removeClass('grid active').addClass('redirectjs list');
                $.ajax({
                    url: "/products/list",
                    type: "GET",
                    success: function(data) {
                        $("#content").html(data);
                    }

                });


            })





        });
    </script>
@endsection
