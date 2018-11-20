@extends('master')
@section('breadcrumb')
    @include('partials.breadcrumb')
@stop
@section('content')
    <div class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} section_padding_top_100 section_padding_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-single">
                        <figure class="shop-single__img">
                            @if($product->images->count()>0)
                                <div class="format-gallery">
                                    <div class="entry-thumbnail">
                                        <div id="carousel-generic" class="carousel slide">
                                            <div class="carousel-inner">
                                                @foreach($product->images as $key => $image)
                                                <div class="item {{ $key==0?'active':'' }}">
                                                    <img src="{{ asset('assets/images/products/'.$image->image) }}" alt="{{ $product->name }}">
                                                </div>
                                                @endforeach
                                            </div>
                                            <a class="left carousel-control" href="#carousel-generic" data-slide="prev">
                                                <span class="format-gallery__prew"></span>
                                            </a>
                                            <a class="right carousel-control" href="#carousel-generic" data-slide="next">
                                                <span class="format-gallery__next"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <img src="{{  asset('assets/images/no-image.png') }}" alt="{{ $product->name }}">
                            @endif
                        </figure>
                        <div class="shop-single__content">
                            <ul class="shop-item__meta-list">
                                @if($product->tags->count()>0)
                                    <li>
                                        <a class="shop-item__meta-tag" href="{{ action('CategoryController@show',str_slug($product->category->name)) }}">{{ $product->category->name }}</a>
                                    </li>
                                @endif
                                <li>
                                    <h3 class="shop-item__title">
                                        {{ $product->name }}
                                    </h3>
                                </li>
                               {{-- <li>
                                    <div class="star-rating" title="Rated 4.00 out of 5">
												<span style="width:80%">
													<strong class="rating">4.00</strong> out of 5
												</span>
                                    </div>
                                </li>--}}
                            </ul>
                            <p class="shop-item__desc">
                                {{ $product->description }}
                            </p>
                            @if($product->tags->count()>0)
                                <p class="shop-tags">
                                    <span>Tags:</span>
                                    @foreach($product->tags as $key=>$tag)
                                        <a href="#">{{ $tag->name }}</a>
                                        @if(($key+1)< $product->tags->count())
                                            ,
                                        @endif
                                    @endforeach
                                </p>
                            @endif
                            {!! Form::open(['route'=>['cart.update',$product->id],'method'=>'put','class'=>'single-shop-item__gty']) !!}
                                    <span class="quantity form-group">
                                            <input type="button" value="-" class="minus">
                                            <input type="number" step="1" min="0" name="quantity" value="{{ $quantity }}" title="Qty" id="product_quantity" class="form-control ">
                                            <input type="button" value="+" class="plus">
                                    </span>
                                    <button class="button-t1" type="submit">Add to cart</button>
                                    <span class="price">
                                        <span>
                                            <span class="amount">&euro;{{ $product->price }}</span>
                                        </span>
                                    </span>
                            {!! Form::close() !!}
                         {{--   <a class="btn__wish" href="#">Add to Wishlist</a>--}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <hr />
                    <div id="disqus_thread"></div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')

    <script>

        /**
         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
         var disqus_config = function () {
         this.page.url = '{{ url('/') }}';  // Replace PAGE_URL with your page's canonical URL variable
         this.page.identifier = 'product-{{ $product->id }}}'; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
         };
        (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = '//edenmill.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the</noscript>
    <script id="dsq-count-scr" src="//edenmill.disqus.com/count.js" async></script>
@stop