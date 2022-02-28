<div class="header-container header-color color">
    <div class="header_full">
        <div class="header">
            <div class="header-logo show-992">
                <a href="index.html" class="logo"> <img class="img-responsive" src="assets/images/logo.png"
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
                                                src="assets/images/logo.png" alt="" /></a>
                                    </div>
                                    <!--- .header-logo -->
                                    <div class="magicmenu clearfix">
                                        <ul class="nav-desktop sticker">
                                            <li class="level0 logo display"><a class="level-top"
                                                    href="index.html"><img alt="logo" src="assets/images/logo.png"></a>
                                            </li>
                                            <li class="level0 home">
                                                <a class="level-top" href="{{ url('/dashboard') }}"><span
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
                            <div class="icon-setting"><i class="icon-magnifier icons"></i></div>
                        </div>
                        <div class="dispaly-seach dropdown-switcher">
                            <form id="search_mini_form" action="#" method="get">
                                <div class="form-search clearfix">
                                    <input id="catsearch" type="hidden" name="cat" />
                                    <input id="search" type="text" name="q" class="input-text"
                                        placeholder="Search ..." />
                                    <select class="ddslick" id="cat" name="cat">
                                        <option value="">Categories</option>
                                        <option value="4">Men</option>

                                    </select>
                                    <button type="submit" title="Search" class="button"><span><span><i
                                                    class="icon-magnifier icons"></i></span></span></button>
                                </div>
                                <!--- .form-search -->
                            </form>
                            <!--- #search_mini_form -->
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
                                        <li><a href="#" title="My Account">My Account</a></li>
                                        <li><a href="my-wish-list.html" title="My Wishlist">My Wishlist</a></li>
                                        <li><a href="compare.html" title="Compare Products">Compare Products</a></li>
                                        <li><a href="#" title="My Cart">My Cart</a></li>
                                        {{-- <li class="last">
                                            <!-- Authentication -->
                                   <form method="POST" action="{{ route('logout') }}">
                                      @csrf
                          
                                      <x-jet-dropdown-link href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                      this.closest('form').submit();">
                                       <i class="fa fa-power-off">   {{ ('Log Out') }}</i>
                                      </x-jet-dropdown-link>
                                  </form>
                                          
                                        </li> --}}
                           
                                       
                                          
                                          
                                                <li><a href="checkout-step1.html" title="Checkout"
                                                        class="top-link-checkout">Checkout</a></li>
                                                <li class=" last"><a href="{{ route('login') }}"
                                                        title="Log In">Log In</a></li>

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
                                        <li class="item clearfix">
                                            <div class="cart-content-top">
                                                <a href="#" class="product-image"><img src="http://placehold.it/60x75"
                                                        width="60" height="77" alt="Brown Arrows Cushion"></a>
                                                <div class="product-details">
                                                    <p class="product-name"><a href="#">Brown Arrows Cushion</a></p>
                                                    <strong>1</strong> x <span class="price">$229.00</span>
                                                </div>
                                            </div>
                                            <div class="cart-content-bottom">
                                                <div class="clearfix"> <a href="#" title="Edit item"
                                                        class="btn-edit"><i class="fa fa-pencil-square-o"></i></a> <a
                                                        href="#" title="Remove" class="btn-remove btn-remove2"><i
                                                            class="icon-close icons"></i></a></div>
                                            </div>
                                        </li>

                                    </ol>
                                    <p class="subtotal"> <span class="label">Subtotal:</span> <span
                                            class="price">$687.00</span></p>
                                    <div class="actions"> <a href="#" class="view-cart"> View cart </a> <a
                                            href="checkout-step1.html">Checkout</a></div>
                                </div>
                            </div>
                            <!--- .mini-contentCart -->
                        </div>
                        <!--- .mini-maincart -->
                    </div>
                    <!--- .miniCartWrap -->

                </div>
                <!--- .header-page -->
            </div>
            <!--- .header -->
        </div>
        <!--- .header_full -->
    </div>
