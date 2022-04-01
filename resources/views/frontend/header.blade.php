<div class="header-container header-color color">
    <div class="header_full">
        <div class="header">
            <div class="header-logo show-992">
                <a href="index.html" class="logo"> <img class="img-responsive" src="{{asset('assets/images/logo.png')}}"
                        alt="" /></a>
            </div>
            <!--- .header-logo -->
            <div class="header-bottom">
                <div class="container">
                    <div class="row">
                        <div class="header-config-bg">
                            <div class="header-wrapper-bottom">
                                <div class="custom-menu col-lg-12">
                                    <div class="header-logo hidden-992">
                                        <a href="index.html" class="logo"> <img class="img-responsive"
                                                src="{{asset('assets/images/logo.png')}}" alt="" /></a>
                                    </div>
                                    <!--- .header-logo -->
                                    <div class="magicmenu clearfix">
                                        <ul class="nav-desktop sticker">
                                            <li class="level0 logo display"><a class="level-top"
                                                    href="index.html"><img alt="logo" src="{{ asset('assets/images/logo.png') }}"></a>
                                            </li>
                                            <li class="level0 home">
                                                <a class="level-top" href="{{ url('/') }}"><span
                                                        class="icon-home fa fa-home"></span><span
                                                        class="icon-text">Home</span></a>

                                            </li>

                                        </ul>
                                    </div>
                                    <!--- .magicmenu -->

                                </div>
                                <!--- .custom-menu -->
                            </div>
                            <!--- .header-wrapper-bottom -->
                        </div>
                        <!--- .header-config-bg -->
                    </div>
                    <!--- .row -->
                </div>
                <!--- .container -->
            </div>
            <!--- .header-bottom -->
            <div class="header-page clearfix">
                <div class="header-setting header-search">
                    <div class="settting-switcher">
                        <div class="dropdown-toggle">
                            <div class="icon-setting"></div>
                        </div>
                        
                    </div>
                </div>
                <!--- .header-search -->
                <div class="header-setting">
                    <div class="settting-switcher">
                        <div class="dropdown-toggle">
                            <div class="icon-setting"><i class="icon-settings icons"></i></div>
                        </div>
                        <div class="dropdown-switcher">
                            <div class="top-links-alo">
                                <div class="header-top-link">
                                    <ul class="links">
                                        {{-- <li><a href="#" title="My Account">My Account</a></li>
                                        <li><a href="my-wish-list.html" title="My Wishlist">My Wishlist</a></li>
                                        <li><a href="compare.html" title="Compare Products">Compare Products</a></li>
                                        <li><a href="#" title="My Cart">My Cart</a></li>
                                        {{-- <li class="last"> --}}
                                            <!-- Authentication -->
                                   {{-- <form method="POST" action="{{ route('logout') }}">
                                      @csrf
                          
                                      <x-jet-dropdown-link href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                      this.closest('form').submit();">
                                       <i class="fa fa-power-off">   {{ ('Log Out') }}</i>
                                      </x-jet-dropdown-link>
                                  </form> --}}
                                          
                                        </li>
                           
                                       
                                          
                                          
                                                {{-- <li><a href="checkout-step1.html" title="Checkout"
                                                        class="top-link-checkout">Checkout</a></li> --}}
                                                {{-- <li class=" last"><a href="{{ route('login') }}"
                                                        title="Log In">Log In</a></li> --}}

                                                 <li class="last">
                                                            <!-- Authentication -->
                                                   <form method="POST" action="{{ route('logout') }}">
                                                      @csrf
                                          
                                                      <x-jet-dropdown-link href="{{ route('logout') }}"
                                                               onclick="event.preventDefault();
                                                                      this.closest('form').submit();">
                                                       <i class="fa fa-power-off">   {{ ('Log Out') }}</i>
                                                      </x-jet-dropdown-link>
                                                  </form>
                                                          
                                                        </li>
                                           
                                           
                                       

                                        </ul>
                                    </div>
                                    {{-- ............................... --}}





                                    {{-- ................................................. --}}
                                </div>
                                <!--- .top-links-alo -->

                            </div>
                            <!--- .dropdown-switcher -->
                        </div>
                        <!--- .settting-switcher -->
                    </div>
                    <!--- .header-setting -->
                    <div class="miniCartWrap">
                        <div class="mini-maincart">
                            <div class="cartSummary">
                                <div class="crat-icon">
                                    <span class="icon-handbag icons"></span>
                                    <p class="mt-cart-title">My Cart</p>
                                </div>
                                <div class="cart-header">
                                    <span class="zero">0 </span>
                                    <p class="cart-tolatl">
                                        <span class="toltal">Total:</span>
                                        <span><span class="price">$0.00</span></span>
                                    </p>
                                </div>
                            </div>
                            <!--- .cartSummary -->
                            <div class="mini-contentCart" style="display: none">
                                <div class="block-content">
                                    <p class="block-subtitle">Recently added item(s)</p>
                                    <ol id="cart-sidebar" class="mini-products-list clearfix">
    
                                        @php $total = 0 @endphp
                                        @foreach ($cartt as $items)
                                        @php $total += $items->qty *  $items->product->price @endphp
                                      
                                     {{-- @php   echo $items->product->image; @endphp --}}
                                        <li class="item clearfix">
                                            <div class="cart-content-top">
                                                <a href="{{ url('/products',$items->product->url)}}"
                                                    title="{{ $items->product->name }}" class="product-image">
                                                    <img src="{{asset('storage/media/'.$items->product->image)}}"
                                                        width="60" height="77" alt="Brown Arrows Cushion">
                                                </a>
                                                <div class="product-details">
                                                    <p class="product-name">
                                                        <a href="{{ url('/products', $items->product->url)}}"
                                                            title="{{ $items->product->name }}">{{ $items->product->name }}</a>
                                                    </p>
                                                    <strong>{{ $items->qty }}</strong> x <span
                                                        class="price">₹{{$items->product->price}}</span>
                                                    <p class="price"><strong>=
                                                             ₹{{ $items->qty * $items->product->price }}
                                                            </strong>
                                                    </p>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                    </ol>
                                    <p class="subtotal"> <span class="label">Subtotal:</span> <span
                                            class="price">Total ₹{{ $total }}</span></p>
                                    <div class="actions"> <a href="{{ url('products/cart') }}" class="view-cart"> View cart </a> <a
                                            href="#">Checkout</a></div>
                                </div>
                            </div>
                            <!--- .mini-contentCart -->
                        </div>
                        <!--- .mini-maincart -->
                    </div>
                    <!--- .miniCartWrap -->
                    <!--- .miniCartWrap -->

                </div>
                <!--- .header-page -->
            </div>
            <!--- .header -->
        </div>
        <!--- .header_full -->
    </div>