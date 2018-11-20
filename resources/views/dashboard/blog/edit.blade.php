@extends('dashboard.layouts.default')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datetimepicker/jquery.datetimepicker.css') }}">
@stop
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Blog Post</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::model($post,['action'=>['BlogController@update',$post->id],'method'=>'patch','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-1">
                        @include('dashboard.blog._formCreateEdit')
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-8">
                        <span class="pull-right">
                             <button type="reset" class="btn btn-default">Cancel</button>
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
  {{--  <script src="{{ asset('assets/plugins/ckinplace/ck/ckeditor.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/ckinplace/ck/adapters/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/ckinplace/ck-in-place.js') }}" type="text/javascript"></script>--}}
  <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

    <script src="{{ asset('assets/plugins/datetimepicker/jquery.datetimepicker.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            $('input[name="publish_at"]').datetimepicker({
                        startDate:'{{ Carbon\Carbon::parse() }}',
                        format: 'Y-m-d h:n:s'
                    });
        });
    </script>
    <script>

        $(function () {
            //Initialize Select2 Elements
            try {
                $(".select2").select2({
                    placeholder:'Select an option'
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
