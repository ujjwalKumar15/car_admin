<div class="block-content">
    <p class="block-subtitle">added item(s)</p>
    <ol id="cart-sidebar" class="mini-products-list clearfix">
    
            @foreach ($cartt as $items)
                <li class="item clearfix">
                    <div class="cart-content-top">
                        <a href="{{ url('/products', $items->product->url)}}" title="{{ $items->product->name }}"
                            class="product-image">
                            <img src="{{ asset('storage/media/'.$items->product->image) }}"
                                width="60" height="77" alt="Brown Arrows Cushion">
                        </a>
                        <div class="product-details">
                            <p class="product-name">
                                <a href="{{ url('/products', $items->product->url)}}"
                                    title="{{ $items->product->name }}">{{ $items->product->name }}</a>
                            </p>
                            <strong>{{ $items->qty }}</strong> x <span
                                class="price">₹{{ $items->qty * $items->product->price }}</span>
                        </div>
                    </div>
                </li>
            @endforeach
        
        {{-- @guest
            @foreach ($cart as $key => $items)
                <li class="item clearfix">
                    <div class="cart-content-top">
                        <a href="#" title="{{ $items['name'] }}"
                            class="product-image">
                            <img src="/public/main_images/{{ $items['image'] }}"
                                width="60" height="77" alt="Brown Arrows Cushion">
                        </a>
                        <div class="product-details">
                            <p class="product-name">
                                <a href="#"
                                    title="{{ $items['name'] }}">{{ $items['name'] }}</a>
                            </p>
                            <strong>{{ $items->product_stock }}</strong> x <span
                                class="price">${{ $items['stock'] * $items['price'] }}</span>
                        </div>
                    </div>
                </li>
            @endforeach
        @endguest
    </ol>
    <div class="actions"><a href="{{ url('/cart') }}" class="view-cart">View cart</a></div>
</div> --}}
