@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Subscriber</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('SubscriberController@index') }}" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Show Subscribers">
                        <i class="fa fa-list"></i></a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::open(['action'=>['SubscriberController@store'],'method'=>'post','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        @include('dashboard.subscribers._formCreateEdit')
                       
                    </div>
                </div>
                {{--<hr>

                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <h4 class="text-center">Billing Address</h4>
                        <hr>

                    </div>
                    <div class="col-sm-4 col-sm-offset-1">
                        <h4 class="text-center">Shipping Address</h4>
                        <hr>

                    </div>
                </div>--}}
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-11">
                        <span class="pull-right">
                             <button type="reset" class="btn btn-default">Cancel</button>
                             &nbsp;
                             <button type="submit" class="btn btn-info ">Create</button>
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

    <script>

        $(function () {
            //Initialize Select2 Elements
            try {
                $(".select2").select2({
                    placeholder:'Select User Roles'
                });
            }catch (e){
                console.error(e);
            }
            try {
                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
            }catch (e){
                console.error(e);
            }

        });
    </script>
@stop
