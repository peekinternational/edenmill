@extends('master')
@section('title', 'Home Page')
@section('breadcrumb')
    @include('partials/breadcrumb')
@stop
@section('content')
    <div class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} section_padding_top_120 section_padding_bottom_85">
        <div class="container">
            <div class="row">
                 @include('partials/sidebar')
                <div class="col-sm-8 col-md-9 col-lg-9">
                    @if($products->count()>0)
                    <div class="shop-sorting">
                        <form class="form-inline">
                            <div class="form-group">
                                <select class="form-control orderby" name="limit" id="limit">
                                    <option value="10" selected="">10 items/pages</option>
                                    <option value="20" >20 items/pages</option>
                                    <option value="30" >30 items/pages</option>
                                    <option value="50" >50 items/pages</option>
                                </select>
                                <select class="form-control orderby" name="orderby" id="orderby_2">
                                    <option value="menu_order" selected="">Name: A to Z</option>
                                    <option value="menu_order">Name: Z to A</option>
                                    <option value="date">New First</option>
                                    <option value="date">Old First</option>
                                    <option value="price">Price: Low To High</option>
                                    <option value="price-desc">Pric: High To Low</option>
                                </select>
                            </div>
                            <div class="form-group toggle-wrapper">
                                <a href="#" id="toggle_shop_view" class=""></a>
                            </div>
                        </form>
                    </div>
                    <ul id="products" class="products list-unstyled grid-view">
                    @foreach($products as $product)

                        <li class="shop-item product type-product item-list">

                            <div class="side-item">
                                <figure class="item-media shop-item__img">
                                    <a href="{{ url('product/'.$product->slug) }}">
                                        <?php
                                            $first_image = $product->images->first();
                                            $image = 'no-image.png';
                                                if(isset($first_image->image) && !empty($first_image)){
                                                    $image = 'products/'.$first_image->image;
                                                }
                                        ?>
                                        <img src="{{  asset('assets/images/'.$image) }}" alt="{{ $product->name }}">
                                    </a>
                                </figure>
                                <div class="shop-item__content">
                                    <div class="shop-item__meta-list">
                                        @if($product->tags->count()>0)
                                        <a class="shop-item__meta-tag" href="#">{{ $product->category->name }}</a>
                                        @endif
                                       {{-- <div class="star-rating" title="Rated 4.00 out of 5">
                                                    <span style="width:80%">
                                                        <strong class="rating">4.00</strong> out of 5
                                                    </span>
                                        </div>--}}
                                    </div>
                                    <div class="items-name">
                                    <h3 class="shop-item__title">
                                        <a href="{{ url('/product/'.$product->slug) }}">{{ $product->name }}</a>
                                    </h3>
                                    <p class="shop-item__desc">
                                       {{ $product->details }}
                                    </p>
                                </div>
                                    <div class="shop-item__block">
                                        {!! Form::open(array('url' => 'cart','method' => 'post')) !!}
                                             {!! Form::button('Add to cart',['class'=>'button-t1','type'=>'submit']) !!}
                                             {!!  Form::hidden('id',$product->id)  !!}

                                                <span class="shop-item__price">
                                                    <span>
                                                        <span class="amount">&euro; {{ $product->price  }}</span>
                                                    </span>
                                                </span>
                                         {!! Form::close() !!}

                                    </div>
                                </div>
                            </div>
                        </li>
                        @endforeach
                     </ul>
                    <div class="row">
                        <div class="col-sm-12 text-left">
                            @if(isset($_GET['q']))
                                 {{ $products->appends(['q' => $_GET['q']])->links('vendor.pagination.default') }}
                            @else
                                {{ $products->links('vendor.pagination.default') }}
                            @endif
                        </div>
                    </div>
                    @else
                        <div class="alert alert-info text-center lead">
                            Products Not Found
                        </div>
                    @endif
                </div>

            </div>

        </div>

    </div>

@stop


@section('scripts')
<!--=================Scroll with Menu================-->
    <script>
        $(document).ready(function(){
            // Add smooth scrolling to all links in navbar + footer link
            $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();
                    // Store hash
                    var hash = this.hash;
                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 900, function(){
                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
            $(window).scroll(function() {
                $(".slideanim").each(function(){
                    var pos = $(this).offset().top;
                    var winTop = $(window).scrollTop();
                    if (pos < winTop + 600) {
                        $(this).addClass("slide");
                    }
                });
            });
        })
    </script>
@stop