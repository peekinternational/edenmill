@extends('master')
@section('content')
    <div class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} section_padding_top_100 section_padding_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                        {!! html_entity_decode($page->data) !!}
                </div>
            </div>
        </div>
    </div>
@stop
