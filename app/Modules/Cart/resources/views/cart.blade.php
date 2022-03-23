@extends('Frontend.common')
@section('title')
    Cart
@endsection
@section('content')
    <div class="page">
        <div class="main-container col1-layout content-color color">
            <div class="breadcrumbs">
                <div class="container">
                    <ul>
                        <li class="home"> <a href="#" title="Go to Home Page">Home</a></li>
                        <li> <strong>My Cart</strong></li>
                    </ul>
                </div>
            </div>
            <!--- .breadcrumbs-->

            <div class="container">
                <div class="content-top no-border">
                    <h2>My Cart</h2>

                </div>

            
                <div class="table-responsive-wrapper">
                    <table class="table-order table-wishlist">
                        <thead>
                            <tr>
                                <td>Remove</td>
                                <td>Product Detail & comments</td>
                                <td>Add to cart</td>
                            </tr>
                        </thead>
                        @php $total=0 @endphp

                        @foreach ($cart_items as $items)

                        @php $total += $items->qty * $items->price @endphp
                            <tbody>
                                <tr>
                                    <td><button type="button" onclick="deleteitems({{ $items->cid }})" class="button-remove"><i class="icon-close"></i></button>
                                    </td>
                                    <td>
                                        <table class="table-order-product-item">
                                            <tr>
                                                <td><img height="100" width="100"
                                                        src="{{ asset('storage/media/' . $items->image)}}" height="200"  width="200"/></td>
                                                <td>
                                                    <a href="{{ url('/products',$items->url) }}">
                                                    <h3> {{ $items->name }} </h3>
                                                </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td class="wish-list-control">
                                        <div class="price">
                                            {{$items->qty * $items->price}}
                                        </div>
                                    
                                        <div class="number-input quantity">
                                            <button type="button"  class="minus" value="{{ $items->id }}">-</button>
                                            <input type="text" value="{{ $items->qty }}" maxlength="1"  class="qty"  onkeypress="return isNumber(event)">
                                          <button type="button" class="plus"  value="{{ $items->id }}" >+</button>
                                          <input type="hidden" name="product_price" id="{{$items->price}}">
                                        </div>
                                    
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach 
                        <tr>
                        <td colspan="4" class="text-center">
                            <h3><strong>Total : {{ $total }}</strong></h3>
    
                        </td>
                        </tr>
                    
                            
                    </table>
                    
                    <br>
                    <div class="text-center">   
                    <button type="button" class="btn-step">Place Order</button>
                    </div>
                </div>
                <!--- .table-responsive-wrapper-->
            </div>
            <!--- .container-->
        </div>
        <!--- .main-container -->
    </div>
@endsection

@section('custom_scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    

    <script>

     function deleteitems(id) {
           // alert(id);
            jQuery.ajax({
                url: "/cart/delete",
                type: "get",
                data: {
                    'id': id,
                },
                success: function(data) {
                    console.log("prodeuct remove successful!!");
                    location.reload();
                }
            });
        }

    // 

    function isNumber(evt) {
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode > 31 && (charCode < 49 || charCode > 50)) {
        return false;
    }
    return true;
}

    $(document).ready(function () {

$('.plus').click(function (e) {
    e.preventDefault();
    var incre_value = $(this).parents('.quantity').find('.qty').val();
    var value = parseInt(incre_value, 2);
    value = isNaN(value) ? 2 : value;
    if(value<=2){
        
        $(this).parents('.quantity').find('.qty').val(value);
    }


     });

     $('.minus').click(function (e) {
            e.preventDefault();
            var decre_value = $(this).parents('.quantity').find('.qty').val();
            var value = parseInt(decre_value, 1);
            value = isNaN(value) ? 1 : value;
            if(value>=1){
                
                $(this).parents('.quantity').find('.qty').val(value);
            }
        });



});




        $(document).ready(function() {


            $('.plus, .minus,.qty').on('click change', function() {

                var id = $(this).val();
                var quantity = $(this).parent().find('.qty').val();
                var price=jQuery(this).parent().parent().find('.price');
                console.log(id);
                console.log(quantity);

                    $.ajax({
                    url:"/view",
                    type: "GET",
                    data: {

                        'id': id,
                        'quantity': quantity,
                        price:jQuery(this).parent().find("input[name='product_price']").attr('id'),


                    },

                    success: function(response) {
                         price.html(response.price);
                         console.log(response.total);
                       
                        // alert("product updated");
                        // location.reload();
                        
                        
                    },

                });
            });

        });
    </script>
@endsection