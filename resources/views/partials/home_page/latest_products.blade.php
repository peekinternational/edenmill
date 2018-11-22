@if($latest_products->count()>0)
    <div id="shop" class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} section_padding_bottom_85 banners__position">
        <div class="container">
            <div class="content-block-03" style="  padding-top: 55px;padding-bottom: 0px; text-align: center;">
                <h2 class="title-t3 text-sm-center eden-farm-text" style="margin-bottom: 10px;">Edenmill Farm</h2>
                <h2 class="title-t2 title-t2--padding text-sm-center eden-farm-text">Latest from our Shop and Smokery</h2>
            </div>
            <div class="clearfix"></div>
            @foreach($latest_products->chunk(4) as $products)
                <div class="row">
                    @foreach($products as $product)
                        <div class="col-lg-3 col-md-3 col-sm-3">
                            <figure class="banner-01__img">
                                <a class="banner-01__img-wrapp" href="{{ url('product/'.$product->slug) }}">
                                    @if($product->images->count()>0)
                                        <img  src="{{ asset('assets/images/products/'.$product->images->first()->image) }}" alt="{{ $product->name }}">
                                    @else
                                        <img  src="{{ asset('assets/images/no-image.png') }}" alt="{{ $product->name }}">
                                    @endif
                                </a>
                            </figure>
                            <div class="banner-01__content">
                                <h3 class="banner-01__title">
                                    <a href="{{ url('product/'.$product->slug) }}">
                                        {{ $product->name }}
                                        <br/>
                                        <span class="title-green">{{ $product->category['name'] }}</span>
                                    </a>
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endif
{{--
<div id="shop" class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} section_padding_bottom_85 banners__position">
    <div class="container">
        <div class="content-block-03" style="  padding-top: 55px;padding-bottom: 0px; text-align: center;">
            <h2 class="title-t3 text-sm-center" style="margin-bottom: 10px;">Edenmill Farm</h2>
            <h2 class="title-t2 title-t2--padding text-sm-center">Latest from our Shop and Smokery</h2>
        </div>





        <!--<h2>here </h2>-->



        <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-3">

                <figure class="banner-01__img">

                    <a class="banner-01__img-wrapp" href="#">

                        <img src="{{ asset('assets/images/edenmillfarm/ribeye-steak.jpg') }}" alt="">

                    </a>

                </figure>

                <div class="banner-01__content">

                    <h3 class="banner-01__title">

                        <a href="shop-single-item.html">

                            Aberdeen <br/>

                            <span class="title-green">Angus</span>

                        </a>

                    </h3>



                </div>

            </div>



            <div class="col-lg-3 col-md-3 col-sm-3">

                <figure class="banner-01__img">

                    <a class="banner-01__img-wrapp" href="#">

                        <img src="{{ asset('assets/images/edenmillfarm/edenmill-lamb-leg-300x300.jpg') }}" alt="">

                    </a>

                </figure>

                <div class="banner-01__content">

                    <h3 class="banner-01__title">

                        <a href="#">

                            Lamb <br/>

                            <span class="title-green">Chops</span>

                        </a>

                    </h3>



                </div>

            </div>

            <div class="col-lg-3 col-md-3 col-sm-3">

                <figure class="banner-01__img">

                    <a class="banner-01__img-wrapp" href="#">

                        <img src="{{ asset('assets/images/edenmillfarm/edenmill-category-pies-300x300.jpg') }}" alt="">

                    </a>

                </figure>

                <div class="banner-01__content">

                    <h3 class="banner-01__title">

                        <a href="#">

                            Pies <br/>

                            <span class="title-green">Bread</span>

                        </a>

                    </h3>



                </div>

            </div>

            <div class="col-lg-3 col-md-3 col-sm-3">

                <figure class="banner-01__img">

                    <a class="banner-01__img-wrapp" href="#">

                        <img src="{{ asset('assets/images/edenmillfarm/edenmill-pork-link-sausage-300x300.jpg') }}" alt="">

                    </a>

                </figure>

                <div class="banner-01__content">

                    <h3 class="banner-01__title">

                        <a href="#">

                            Pork <br/>

                            <span class="title-green">Bunches</span>

                        </a>

                    </h3>



                </div>

            </div>



        </div>

        <div class="row">

            <div class="col-lg-3 col-md-3 col-sm-3">

                <figure class="banner-01__img">

                    <a class="banner-01__img-wrapp" href="#">

                        <img src="{{ asset('assets/images/edenmillfarm/edenmill-individual-steak-pie-300x300.jpg') }}" alt="">

                    </a>

                </figure>

                <div class="banner-01__content">

                    <h3 class="banner-01__title">

                        <a href="shop-single-item.html">

                            Individual Steak  <br/>

                            <span class="title-green">Pie</span>

                        </a>

                    </h3>



                </div>

            </div>



            <div class="col-lg-3 col-md-3 col-sm-3">

                <figure class="banner-01__img">

                    <a class="banner-01__img-wrapp" href="#">

                        <img src="{{ asset('assets/images/edenmillfarm/edenmill-steak-pie-600x600.jpg') }}" alt="">

                    </a>

                </figure>

                <div class="banner-01__content">

                    <h3 class="banner-01__title">

                        <a href="#">

                            1/2lb Steak  <br/>

                            <span class="title-green">Pie</span>

                        </a>

                    </h3>



                </div>

            </div>

            <div class="col-lg-3 col-md-3 col-sm-3">

                <figure class="banner-01__img">

                    <a class="banner-01__img-wrapp" href="#">

                        <img src="{{ asset('assets/images/edenmillfarm/chicken-ham-pie.jpg') }}" alt="">

                    </a>

                </figure>

                <div class="banner-01__content">

                    <h3 class="banner-01__title">

                        <a href="#">

                            1/2 lb Chicken and  <br/>

                            <span class="title-green">Ham Pie</span>

                        </a>

                    </h3>



                </div>

            </div>

            <div class="col-lg-3 col-md-3 col-sm-3">

                <figure class="banner-01__img">

                    <a class="banner-01__img-wrapp" href="#">

                        <img src="{{ asset('assets/images/edenmillfarm/edenmill-half-pound-chicken-and-ham-pie-600x600.jpg') }} " alt="">

                    </a>

                </figure>

                <div class="banner-01__content">

                    <h3 class="banner-01__title">

                        <a href="#">

                            Topside   <br/>

                            <span class="title-green">Roast</span>

                        </a>

                    </h3>



                </div>

            </div>
        </div>
    </div>
</div>--}}