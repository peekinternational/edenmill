@extends('dashboard.layouts.default')
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/datetimepicker/jquery.datetimepicker.css') }}">
@stop
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">New Blog Post</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::open(['action'=>['BlogController@store'],'method'=>'post','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-1">
                        @include('dashboard.blog._formCreateEdit')
                       {{-- <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                            <label for="type" class="col-sm-2 control-label">Post type</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control" name="type" id="type">
                                    <option value="simple">Simple Post</option>
                                    <option value="images">With images</option>
                                    <option value="video">With Videos</option>
                                </select>
                                @if ($errors->has('type'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('type') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div style="display: none;" class="form-group post-images  {{ $errors->has('images') ? ' has-error' : '' }}">
                            <label for="images" class="col-sm-2 control-label">Images</label>
                            <div class="col-sm-10">
                                <input type="file" name="images[]" accept="image/*">
                                @if ($errors->has('images'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('meta_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div style="display: none;" class="form-group post-video  {{ $errors->has('video') ? ' has-error' : '' }}">
                            <label for="video" class="col-sm-2 control-label">Video</label>
                            <div class="col-sm-10">
                                <input type="file" name="video" accept="video/*">
                                @if ($errors->has('video'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('video') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>--}}
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
                             <button type="submit" class="btn btn-info ">Post</button>
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
    <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
    {{--<script src="{{ asset('assets/plugins/ckinplace/ck/adapters/jquery.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/plugins/ckinplace/ck-in-place.js') }}" type="text/javascript"></script>
--}}
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
            $('.select2').on('select2:select', function (evt) {
                if($(this).val()=='images'){
                    $('.post-images').show();
                    $('.post-video').hide();
                }else if($(this).val()=='video'){
                    $('.post-images').hide();
                    $('.post-video').show();
                }else{
                    $('.post-images').hide();
                    $('.post-video').hide();
                }
            });

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
