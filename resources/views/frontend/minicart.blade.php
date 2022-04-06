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

