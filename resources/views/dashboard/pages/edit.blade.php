@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Page</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('PagesController@index') }}" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Show Pages">
                        <i class="fa fa-list"></i></a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::model($page,['action'=>['PagesController@update',$page->id],'method'=>'patch','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        @include('dashboard.pages._formCreateEdit')
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-12">
                        <span class="pull-right">
                             <button type="reset" class="btn btn-default">Cancel</button>
                             &nbsp;
                             <button type="submit" class="btn btn-info ">Update Page</button>
                        </span>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
                    <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
@stop
@section('footer')
    <script src="{{ asset('assets/plugins/ckinplace/ck/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/ckinplace/ck/adapters/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/ckinplace/ck-in-place.js') }}" type="text/javascript"></script>
@stop
