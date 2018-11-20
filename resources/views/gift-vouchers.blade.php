@extends('master')
@section('breadcrumb')
    @include('partials.breadcrumb')
@stop
@section('content')
    <div class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} section_padding_top_100 section_padding_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop-single" style="border: none">
                        <figure class="shop-single__img">
                            <img src="{{ asset('assets/images/shop/shop_item/img_shop-item-01.jpg') }}" alt="">
                        </figure>
                        <div class="shop-single__content" >
                            <h3 class="flexslider__title">
                                <span>Gift Vouchers  </span></h3>
                            <p class="shop-item__desc shop-tags" >An entirely flexible and open Gift Voucher. Amounts from £10 upwards and valid for 12 months.!</p>
                            <form action="{{url('/checkout/gift-vouchers')}}" method="get" class="single-shop-item__gty flexslider__form">
                                <label for="price">Price</label>
                                <select class="form-control flexslider__input-name" name="price" id="price">
                                    @for($i=10;$i<=200;$i=$i+5)
                                        <option value="{{$i}}">&euro; {{$i}}</option>
                                    @endfor
                                </select>
                                <label>Post type</label>
                                <select class="form-control flexslider__input-name" name="type" id="type" >
                                    <option value="e_voucher">E Voucher</option>
                                    <option value="post_voucher">Post Voucher</option>
                                </select>
                                		<span class="quantity form-group">
                                            <label>Quantity</label>
											<input type="button" value="-" class="minus" style="top: 46px;">
											<input type="number" step="1" min="0" name="quantity" value="1" title="Qty" id="product_quantity" class="form-control ">
											<input type="button" value="+" class="plus" style="top: 46px;">
                                        </span><br>
                                <button class="button-t1">Buy Now</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 20px; " class="col-lg-12">
                    <div class="shop-single" style="padding: 30px;background-color: #f7f7f7;">
                        <div class="" >
                            <h3 class="flexslider__title">
                                <span>What is this?</span></h3>
                                <p class="" >An entirely flexible and open Adventure Voucher. Amounts from £10 upwards and valid for 12 months.!</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    {{--<div class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} section_padding_top_100 section_padding_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{url('/checkout/gift-vouchers')}}" method="get">
                        <select name="quantity" id="quantity">
                            @for($i=1;$i<21;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                        <select name="type" id="type">
                            <option value="e_voucher">E Voucher</option>
                            <option value="post_voucher">Post Voucher</option>
                        </select>
                        <select name="price" id="price">
                            @for($i=1;$i<100;$i=$i+5)
                                <option value="{{$i}}">&euro; {{$i}}</option>
                            @endfor
                        </select>
                        <button type="submit">Buy Now</button>
                    </form>
                </div>
            </div>
        </div>
    </div>--}}
@stop
