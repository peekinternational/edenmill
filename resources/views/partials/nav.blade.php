<header class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }}">
    <div class="page_header header-01" style="height: 92px;">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-12 text-md-center">
                    <a href="{{ url('/') }}" class="logo">
                        <img src="{{ asset('assets/images/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-4 text-lg-center">
         <span class="toggle_menu">
          <span></span>
         </span>
                    <!-- main nav start -->
                    <nav class="mainmenu_wrapper">
                        <ul class="mainmenu nav sf-menu ">
                            @foreach($navs as $key=>$nav)
                                @if(!$nav->hidden)
                                    <li class="a-shop {{ $key==0?'active':'' }}">
                                         <?php
                                            $url = '#';
                                            if(trim($nav->slug) == 'about'){
                                                $url = url('/').'#about-us';
                                            }elseif($nav->slug == 'home'){
                                                $url = url('/');
                                            }elseif($nav->slug == 'blog'){
                                                $url = url('/blog');
                                            }elseif($nav->slug =='shop'){
                                                $url = url('/').'#shop';
                                            }elseif($nav->page_id>0 && isset($nav->page->slug) && !empty($nav->page->slug)){
                                                $url = url($nav->page->slug.'/page');
                                            }
                                            if(!empty($nav->url) && filter_var($nav->url,FILTER_VALIDATE_URL) == true){
                                                $url = $nav->url;
                                            }
                                        ?>
                                        <a href="{{ $url }}" class="sf-with-ul" style="color: {{ $nav->color }};padding: 38px 4px;font-size: 18px;"  onmouseout="this.style.color='{{ $nav->color }}'" onmouseover="this.style.color = 'inherit'">{{ $nav->title }}</a>
                                        @if($nav->sub_navs->count()>0)
                                        <ul style="display: none;">
                                            @foreach($nav->sub_navs as $sub_nav)
                                                @if(!$sub_nav->hidden)
                                                    <li>
                                                        @if($nav->slug == 'shop')
                                                            <a href="{{ url('shop/'.$sub_nav->slug) }}">{{ $sub_nav->title }}</a>
                                                        @elseif($nav->slug =='useful')
                                                            @if($sub_nav->slug=='download-menu')
                                                                @if(!empty($Menu->value && file_exists(public_path('assets/'.$Menu->value))))
                                                                       <a download href="{{ asset('assets/'.$Menu->value) }}">{{ $sub_nav->title }}</a>
                                                                  @else
                                                                       <a href="#">{{ $sub_nav->title }}</a>
                                                                 @endif
                                                                
                                                            @endif
                                                             @if($sub_nav->slug=='download-recipes')
                                                                @if(!empty($Recipes->value && file_exists(public_path('assets/'.$Recipes->value))))
                                                                       <a download href="{{ asset('assets/'.$Recipes->value) }}">{{ $sub_nav->title }}</a>
                                                                  @else
                                                                       <a href="#">{{ $sub_nav->title }}</a>
                                                                 @endif
                                                            @endif
                                                        @else
                                                            <?php
                                                                $url = '#';
                                                                if(isset($sub_nav->page->slug)){
                                                                    $url = url($sub_nav->page->slug.'/page');
                                                                }
                                                                if(!empty($sub_nav->url) && filter_var($sub_nav->url,FILTER_VALIDATE_URL) == true){
                                                                     $url = $sub_nav->url;
                                                               }
                                                            ?>
                                                            <a href="{{ $url }}">{{ $sub_nav->title }}</a>
                                                        @endif
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                @endif
                            @endforeach
                           {{-- <li class="active flex-col hide-for-medium flex-center">
                                <a href="{{ url('/') }}" class="sf-with-ul">Home</a>
                            </li>
                            <li class="a-shop">
                                <a href="#shop" class="sf-with-ul">Shop</a>
                                <ul style="display: none;">
                                    @foreach($shop_categories as $category)
                                        <li>
                                            <a href="{{ url('category/'.$category->slug) }}">{{ $category->title }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                            <!-- pages -->
                            <li class="a-eat" >
                                <a href="#" onmouseout="this.style.color='inherit'" onmouseover="this.style.color = 'red'"  class="sf-with-ul">Eat</a>
                                <ul style="display: none;">
                                    <li>
                                        <a href="#">Cafe</a>
                                    </li>
                                    <li>
                                        <a href="#">Functions</a>
                                    </li>
                                    <li>
                                        <a href="#">Catering</a>
                                    </li>
                                    <li>
                                        <a href="#">Recipes</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="a-play">
                                <a href="#play" class="sf-with-ul">Play</a>
                                <ul style="display: none;">
                                    <li>
                                        <a href="#">Soft Play</a>
                                    </li>
                                    <li>
                                        <a href="#">Birthday Parties</a>
                                    </li>
                                    <li>
                                        <a href="#">Outdoor Animals</a>
                                    </li>
                                    <li>
                                        <a href="#">Outdoor Play</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="a-rest">
                                <a href="#" class="sf-with-ul">Rest</a>
                                <ul style="display: none;">
                                    <li>
                                        <a href="#">Bunkhouse</a>
                                    </li>
                                    <li>
                                        <a href="#">Wigwams</a>
                                    </li>
                                    <li>
                                        <a href="#">Video button</a>
                                    </li>
                                    <li>
                                        <a href="#">Location</a>
                                    </li>
                                    <li>
                                        <a href="#">Awards</a>
                                    </li>
                                    <li>
                                        <a href="#">Newsletter Sign up</a>
                                    </li>
                                    <li>
                                        <a href="#">Offers/Special Events</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="a-walk">
                                <a href="#" class="sf-with-ul">Walk</a>
                                <ul style="display: none;">
                                    <li>
                                        <a href="#">John Muir Way</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="a-blog">
                                <a href="#" class="sf-with-ul">Blog</a>
                            </li>
                            <li class="a-aboutus">
                                <a href="{{ url('/') }}#about-us" class="sf-with-ul">About Us</a>
                            </li>--}}
                    </nav>
                    <!-- eof main nav -->
                </div>

                <div class="col-lg-2 col-md-2 col-sm-6">
                    <div class="shopping-cart" style="margin: 31px 0 22px 31px !important;">

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
                    
                </div>
              
            </div>
        </div>
    </div>
</header>