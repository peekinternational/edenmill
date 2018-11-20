<div class="shopping-cart" style="margin: 33px 0 22px 31px; !important;">

    <a class="shopping-cart__content header-button" id="cart" data-target="#"
       href="{{ route('cart.index') }}" data-toggle="dropdown" aria-haspopup="true"
       aria-expanded="false">
        <span class="shopping-cart__info" style="font-size: 13px; !important;">
            @if($cart_items>0)
                {{ $cart_items }} Items  &euro;{{ $cart->subTotal($format = false, $withDiscount = true) }}
            @else
                (Shopping Basket)
            @endif
           </span>

    </a>
    @if($cart_items > 0)
    <div class="shopping-cart__list dropdown-menu" aria-labelledby="cart">
       {{-- <span class="grey">Recently added item(s)</span>--}}
        <div class="shopping-cart">
           {{-- <a class="shopping-cart__content header-button" id="cart" data-target="#"
               href="http://webdesign-finder.com/" data-toggle="dropdown" aria-haspopup="true"
               aria-expanded="false">
                <span class="shopping-cart__info">3 Items</span>
                $ 25.99
            </a>
            <div class="shopping-cart__list dropdown-menu" aria-labelledby="cart">
--}}

                <span class="grey">Recently added item(s)</span>
                <div class="widget widget_shopping_cart">
                    <div class="widget_shopping_cart_content">
                        <ul class="cart_list product_list_widget media-list darklinks">
                            @foreach($cart->getItems() as $item)
                             <li class="media">
                                <div class="media-left media-middle">
                                    <a href="{{ route('product.show',['slug'=>$item->slug]) }}">
                                        <img src="{{  asset($item->image) }}" alt="{{ $item->name }}">
                                    </a>
                                </div>
                                <div class="media-body media-middle">
                                    <h4>
                                        <a href="blog-right.html">{{ $item->name }}</a>
                                    </h4>
                                      <span class="quantity">{{ $item->qty }} ×
                                       <span class="amount">&euro; {{ $item->price }}</span>
                                      </span>
                                </div>
                                <div class="media-body media-middle">
                                    {!! Form::open(array('route' => array('cart.destroy', $item->id),'method' => 'delete')) !!}
                                        <button type="submit" class="remove" style="background: transparent; border: none;" title="Remove this item">
                                            <i class="rt-icon2-trash highlight"></i>
                                        </button>
                                    {!! Form::close() !!}
                                    {{--<a href="#" class="remove" title="Remove this item">
                                        <i class="rt-icon2-trash highlight"></i>
                                    </a>--}}
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <!-- end product list -->
                        <p class="total">
                            <span class="grey">Cart Subtotal:
                            <span class="amount">${{ $cart->subTotal($format = false, $withDiscount = true) }}</span>
                            </span>
                        </p>
                        <p class="buttons">
                            <a href="{{ route('cart.index') }}" class="button-t1">View All</a>
                            <a href="{{ route('cart.checkout') }}" class="button-t1">Checkout</a>
                        </p>
                    </div>
                </div>

            </div>
     {{--   </div>--}}
    </div>
    @endif
</div>