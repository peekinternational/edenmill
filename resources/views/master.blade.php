@inject('cart', 'LukePOLO\LaraCart\LaraCart')
<?php $cart_items = 0; ?>
@foreach($cart->getItems() as $item)
<?php $cart_items++; ?>
@endforeach
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<html lang="en" class="no-js">
    @include('partials.head')
    @yield('css')
<body>
<!--[if lt IE 9]>
<div class="bg-danger text-center">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/" class="highlight">upgrade your browser</a> to improve your experience.</div>
<![endif]-->
<div class="preloader">
    <div class="thecube">
        <div class="cube c1"></div>
        <div class="cube c2"></div>
        <div class="cube c4"></div>
        <div class="cube c3"></div>
    </div>
</div>
<div id="canvas" class="{{ isset($theme['layout']['value']) && $theme['layout']['value']==1?'boxed':'' }} {{ isset($theme['pattern']['value'])?$theme['pattern']['value']:'pattern0' }}">
    <div id="box_wrapper" class="home {{ isset($theme['layout']['value']) && $theme['layout']['value']==1?'container':'' }} {{ isset($theme['margin']['value']) && $theme['margin']['value']==1?'top-bottom-margins':'' }}">
        @include('partials.logo-bar')
        @include('partials.nav')
        @yield('breadcrumb')
        @yield('content')
        @include('partials.footer')
        @include('partials.footer_copy')
    </div>
</div>

<!-- Main libs -->

<script src="{{ asset('assets/js/script.js') }}"></script>
<!-- Notify -->
<script src="{{ asset('assets/plugins/notify.js') }}"></script>
@if(Session::has('__response') && isset(Session::get('__response')['notify']))
    <script>
        $(document).ready(function () {
            $.notify('{!! Session::get('__response')['notify'] !!}', "{{Session::get('__response')['type']}}");
        });
    </script>
@endif
@yield('scripts')
</body>

</html>
