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
                <div class="row filter">
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
                                        <form action="" id="priceform" class="price-range-form" method="">
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
                                        @foreach ($brands as $brand)
                                            <ul style="" class="nav-accordion font-weight-normal">
                                                <input type="checkbox" name="category[]" id="brand_check"
                                                    value="{{ $brand->id }}" class="category_check"><a href="#"
                                                    class="level-top"><span>&nbsp;{{ $brand->name }}</span></a><br><br><br>
                                                 </ul>
                                        @endforeach

                                    </dd>
                                    <dt class="even">By Colors</dt>
                                    <dd class="even">
                                        <ol class="configurable-swatch-list">
                                            @foreach ($colors as $color)
                                                <li>
                                                        <input type="checkbox"
                                                            class="color_check"  name="color_check"  id="checkbox" value="{{ $color->id }}"><span>&nbsp;{{ $color->name }}</span> </li>
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
                                            class="grid viewas active"> <i class="icon-grid icons"></i> </a>
                                        <a id="list_view" title="List" class="redirectjs viewas list"> <i
                                                class="icon-list icons"></i>
                                        </a>
                                    </p>
                                    <div class="sort-by sort_by">
                                        <label>Sort By</label>
                                        <select id="sort_by">
                                            <option value="name"> Position</option>
                                            <option value="name"> Name</option>
                                            <option value="price"> Price</option>
                                        </select>
                                        <a href="#" title="Set Descending Direction"><img
                                                src="assets/images/i_asc_arrow.gif" alt="Set Descending Direction"
                                                class="v-middle"></a>
                                    </div>
                                    <div class="sort-by order_by">
                                        <label>Order By</label>
                                        <select id="order_by">
                                            <option value="ASC"> Position</option>
                                            <option value="ASC"> Ascending</option>
                                            <option value="DESC">Descending</option>
                                        </select>
                                        <a href="#" title="Set Descending Direction"><img
                                                src="assets/images/i_asc_arrow.gif" alt="Set Descending Direction"
                                                class="v-middle"></a>
                                    </div>
{{-- 
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
                                    </div> --}}
                                </div>
                            </div>

                            <div class="diffrent_view">

                            </div>



                            <!--- .content-->
                            <div id="content">

                                <!--- .products-grid-->


                            </div>
                            <!--- .products-grid-->
                            <div class="page-nav-bottom">
                                {{-- <div class="left">Items 13 to 24 of 38 total</div>
                                <div class="right">
                                    <ul class="page-nav-category">
                                        <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a class="selected" href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                    </ul>
                                </div> --}}
                                {{-- {{ $products->links() }} --}}
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
        var category = [];
        var color = [];


        // function filter() {
            jQuery('.category_check').click(function() {

                if (jQuery(".category_check").is(':checked')) {

                    category.push(jQuery(this).val());
                    console.log(category);



                } else {
                    category.pop(jQuery(this).val());

                }
                filter();




            });

       
            jQuery('.color_check').click(function() {

                if (jQuery(this).is(':checked')) {

                    color.push(jQuery(this).val());
                   console.log(color);



                } else {
                    color.pop(jQuery(this).val());

                }
                  filter();



            });

            

            function filter() {

            var minimum = jQuery('#minimum').val();
            var maximum = jQuery('#maximum').val();

            var sort_by = jQuery('#sort_by').val();
            var order_by =jQuery('#order_by').val();

            jQuery.ajax({
                url: "{{ url('/filter/price') }}",
                type: "GET",
                datatype: 'html',
                data: {

                    view: jQuery('#grid_view').hasClass('active'),

                    'minimum': minimum,
                    'maximum': maximum,
                    'category':category,                    
                    'color': color,
                    'sort_by':sort_by,
                    'order_by':order_by,
                },
                success: function(data) {
                    jQuery("#content").html(data);
                }
            });
        }

        jQuery(document).ready(function($) {
            filter();
        });

        jQuery('#grid_view').on("click", function($) {

            jQuery("#grid_view").removeClass('redirectjs list').addClass('grid active');
            jQuery("#list_view").removeClass('grid active').addClass('redirectjs list');

            filter();
        });

        jQuery('#list_view').on("click", function($) {

            jQuery("#list_view").removeClass('redirectjs list').addClass('grid active');
            jQuery("#grid_view").removeClass('grid active').addClass('redirectjs list');

            filter();
        });


        jQuery("#onsubmit").click(function(e) {
            e.preventDefault();
            filter();
        });
    </script>
@endsection
