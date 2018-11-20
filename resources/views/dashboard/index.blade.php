@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <h1 class="text-center">Dashboard</h1>
        <hr>
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ action('OrderController@index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                        <div class="info-box-content">
                            <h2>Orders </h2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{  action('BlogController@index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-rss"></i></span>
                        <div class="info-box-content">
                            <h2>Blog </h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ action('ProductController@getIndex') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-th"></i></span>
                        <div class="info-box-content">
                            <h2>Products </h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ action('GalleryController@index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-blue"><i class="fa fa-picture-o"></i></span>
                        <div class="info-box-content">
                            <h2>Gallery </h2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ action('CategoryController@index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-teal"><i class="fa fa-th-large"></i></span>
                        <div class="info-box-content">
                            <h3>Product Categories </h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ action('UserController@index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-black"><i class="fa fa-users"></i></span>
                        <div class="info-box-content">
                            <h3>Manage users</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ action('SliderController@index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-fuchsia"><i class="fa fa-picture-o"></i></span>
                        <div class="info-box-content">
                            <h2>Slider</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ action('PagesController@map_page') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-maroon"><i class="fa fa-map-marker"></i></span>
                        <div class="info-box-content">
                            <h2>Map</h2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ action('PagesController@index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-purple"><i class="fa fa-columns"></i></span>
                        <div class="info-box-content">
                            <h2>Pages</h2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ action('NavigationController@index') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-th-list"></i></span>
                        <div class="info-box-content">
                            <h3>Site Navigation</h3>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ action('SettingsController@theme') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-olive"><i class="fa fa-adjust"></i></span>
                        <div class="info-box-content">
                            <h2>Theme</h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ action('SettingsController@showSettings') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-navy"><i class="fa fa-wrench"></i></span>
                        <div class="info-box-content">
                            <h2>Settings </h2>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ url('/user/'.Auth::user()->id) }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-user"></i></span>
                        <div class="info-box-content">
                            <h2>Profile </h2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="{{ url('/logout') }}">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-sign-out"></i></span>
                        <div class="info-box-content">
                            <h2>Logout </h2>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </section>
@stop

