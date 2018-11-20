@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        {!! Form::open(['action'=>['PagesController@postAboutPage'],'method'=>'post','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">About Section</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group {{ $errors->has('title_text') ? ' has-error' : '' }}">
                            <label for="slug" class="col-sm-3 control-label">Text Title</label>
                            <div class="col-sm-6">
                                {!! Form::text('title_text',$value= $about_text->title, $attributes = ['class'=>'form-control ckeditor','placeholder'=>'Text Title'])  !!}
                                @if ($errors->has('title_text'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('title_text') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('about') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-3 control-label">About text <span>*</span></label>
                            <div class="col-sm-6">
                                {!! Form::textarea('about',$value= $about_text->value, $attributes = ['class'=>'form-control','placeholder'=>'About','required'=>true])  !!}
                                @if ($errors->has('about'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('about') }}</strong>
                                            </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">About Section Photo</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                            <i class="fa fa-minus"></i></button>
                    </div>
                </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group {{ $errors->has('photo_title') ? ' has-error' : '' }}">
                            <label for="photo_title" class="col-sm-3 control-label">Photo Title</label>
                            <div class="col-sm-6">
                                {!! Form::text('photo_title',$value= $about_photo->title, $attributes = ['class'=>'form-control','placeholder'=>'Photo Title'])  !!}
                                @if ($errors->has('photo_title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('photo_title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="slug" class="col-sm-3 control-label">Photo</label>
                            <div class="col-sm-6">
                                {!! Form::file('photo', $attributes = ['class'=>'form-control input-photo','placeholder'=>'Photo'])  !!}
                                @if ($errors->has('photo'))
                                    <span class="help-block">
                                                <strong>{{ $errors->first('photo') }}</strong>
                                            </span>
                                @endif
                                <img id="image_upload_preview" class="img-thumbnail" src="{{ asset('assets/images/'.$about_photo->value) }}" alt="{{ $about_photo->title }}">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-9">
                        <span class="pull-right">
                             <button type="reset" class="btn btn-default">Cancel</button>
                             &nbsp;
                             <button type="submit" class="btn btn-info ">Update Page</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
        <!-- /.box -->
    </section>
@stop
@section('footer')
    <script>
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
    </script>
@stop
