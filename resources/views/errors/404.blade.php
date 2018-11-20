@extends('master')
@section('breadcrumb')
    @include('partials.breadcrumb')
@stop
@section('content')
    <div class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} section_padding_top_135 section_padding_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <p class="page-404__not-found">404</p>
                    <h2 class="page-404__sub-title">Oops, page not found!</h2>
                    <p class="page-404__text-info">You can search what interested:</p>
                    <div class="page-404__search">
                        <form method="get" class="searchform form-inline" action="http://webdesign-finder.com/">
                            <div class="form-group">
                                <input id="page_search" value="" name="search" class="form-control" placeholder="Type here" type="text">
                                <button type="submit" class="page-404__search-button">Search</button>
                            </div>
                        </form>
                    </div>
                    <p class="page-404__text-info_2">
                        Or
                        <br>
                    </p>
                    <a href="{{ url('/') }}" class="page-404__button inverse wide_button">go home</a>
                </div>
            </div>
        </div>
    </div>
@stop