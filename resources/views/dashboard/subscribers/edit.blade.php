@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit subscriber</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::model($subscriber,['action'=>['SubscriberController@update',$subscriber->id],'method'=>'PATCH','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        @include('dashboard.partials.formErrorMessage')
                        @include('dashboard.subscribers._formCreateEdit')
                    </div>
                </div>

            </div>

            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        <span class="pull-right">
                             <a href="{{ action('SubscriberController@index') }}" class="btn btn-default">Cancel</a>
                             &nbsp;
                             <button type="submit" class="btn btn-info ">Update</button>
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
    
@stop
