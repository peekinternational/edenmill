@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Slide</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('SliderController@index') }}" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Show slides">
                        <i class="fa fa-list"></i></a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::model($slide,['action'=>['SliderController@update',$slide->id],'method'=>'patch','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        @include('dashboard.slider._formCreateEdit')
                        <div class="form-group {{ $errors->has('background') ? ' has-error' : '' }}">
                            <label for="background" class="col-sm-3 control-label">Background Image <span>*</span></label>
                            <div class="col-sm-9">
                                <input class="form-control input-photo" name="background" id="background" placeholder="Background Image" type="file">
                                @if ($errors->has('background'))
                                    <span class="help-block">
                                    <strong>{{ $errors->first('background') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-sm-9 col-sm-offset-3">
                                <img class="img-thumbnail" id="image_upload_preview" src="{{ asset('assets/images/slider/'.$slide->background) }}" alt="{{ $slide->title }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-3 control-label"> Text Align</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ old('text_align')!='right' && old('text_align')!='center'  ?'checked':'' }} name="text_align" value="left" class="minimal" >
                                    Left
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ old('text_align')=='center'?'checked':'' }} name="text_align" value="center" class="minimal" >
                                    Center
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ old('text_align')=='right'?'checked':'' }} name="text_align" value="right" class="minimal" >
                                    Right
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-8">
                        <span class="pull-right">
                             <a href="{{ action('SliderController@index') }}" class="btn btn-default">
                                 Cancel</a>
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
    <script>

        $(function () {
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('#image_upload_preview').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }
            $(".input-photo").change(function () {
                readURL(this);
            });

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
