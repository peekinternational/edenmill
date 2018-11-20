<aside class="col-sm-4 col-md-4 col-lg-4">
    <div class="widget widget_categories">
        <h3 class="widget-title">Categories</h3>
        <ul class="widget_categories__list">
            <li>
                <a href="{{ url('products') }}">All</a>
            </li>
            @if($ProductCategories->count()>0)
                @foreach($ProductCategories as $category)
                    <li>
                        <a href="{{ url('category/'.str_slug($category->name)) }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <div class="widget widget_price_filter">
        <h3 class="widget-title">Price Filter</h3>
        <!-- price slider -->
        {!! Form::open(['action'=>['ProductController@price_filter'],'method'=>'get']) !!}
            <p class="widget_price__text">Drag slider to change the price range</p>
            <div class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all">
                <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 1.5%; width: 28.5%;"></div>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 1.5%;"></span>
                <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0" style="left: 30%;"></span>
            </div>
            <div class="price__controls">
                <label class="slider_price_min-left" for="slider_price_min">
                    <input type="text" name="min" class="slider_price_min form-control text-center" id="slider_price_min" readonly="">
                </label>
                <label class="slider_price_min-right" for="slider_price_max">
                    <input type="text" name="max" class="slider_price_max form-control text-center" id="slider_price_max" readonly="">
                </label>
            </div>
            <div class="text-center">
                <button type="submit" class="button-t1">Filter</button>
            </div>
        {!! Form::close() !!}
    </div>

    <div class="widget widget_latest_products">
        <h3 class="widget-title">Latest Products </h3>
        <ul class="latest-products__list">
            @foreach($latestProducts as $product)
            <li class="latest-products__item">
                <a class="media-left" href="{{ url('product/'.$product->slug) }}">
                    @if($product->images->count()>0)
                        <img class="media-object" src="{{ asset('assets/images/products/'.$product->images->first()->image) }}" alt="{{ $product->name }}">
                    @else
                        <img class="media-object" src="{{ asset('assets/images/no-image.png') }}" alt="{{ $product->name }}">
                    @endif
                </a>
                <div class="media-body">
                    <p>
                        <a href="{{ url('product/'.$product->slug) }}">{{ $product->name }}</a>
                    </p>
                    <span class="shop-item__price">
                        <span>
                            <span class="amount">&euro; {{ $product->price }}</span>
                        </span>
                    </span>
                    {{--<div class="star-rating" title="Rated 5 out of 5">
                        <span style="width:100%">
                            <strong class="rating">5</strong> out of 5
                        </span>
                    </div>--}}
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</aside>
