@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Navigation</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('NavigationController@index') }}" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Navigation list">
                        <i class="fa fa-list"></i></a>
                    <a href="{{ action('NavigationController@create') }}" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="New Navigation">
                        <i class="fa fa-plus"></i></a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::model($nav_info,['action'=>['NavigationController@update',$nav_info->id],'method'=>'patch','class'=>'form-horizontal']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        @include('dashboard.partials.formErrorMessage')
                        @include('dashboard.navigation._formCreateEdit')
                        @if(!isset($nav_info->slug) || (isset($nav_info->slug) && !empty($nav_info->slug) && !in_array($nav_info->slug,['shop','about-us','home','blog'])))
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> Url</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ old('url_type') == 'page' || $nav_info->url_type == 'page'?'checked':'' }}  name="url_type" value="page" class="minimal" >
                                    Site Page
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ old('url_type') == 'custom' || $nav_info->url_type == 'custom'?'checked':'' }}  name="url_type" value="custom" class="minimal" >
                                    Custom URL
                                </label>
                            </div>
                        </div>
                        <div {!!  old('url_type') == 'custom' || $nav_info->url_type == 'custom'?'style="display:none"':''  !!} class="form-group hidden-url-page {{ $errors->has('page') ? ' has-error' : '' }}">
                            <label for="page" class="col-sm-3 control-label">Navigation Page</label>
                            <div class="col-sm-9">
                                <select autocomplete="off"  name="page_id" style="width: 100%" id="page" class="select2">
                                    <option  {!! old('page_id')==0 || empty($nav_info->page_id)?'selected="selected"':'' !!}  value="0">--- Select Page ---</option>
                                    @if($pages->count()>0)
                                        @foreach($pages as $id=>$page)
                                            <option  {!! old('page_id')==$id || $nav_info->page_id == $id?'selected':'' !!} value="{{ $id }}">{{ $page }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('page_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('page_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div {!! old('url_type') == 'page' || $nav_info->url_type == 'page'?'style="display:none"':'' !!}  class="form-group hidden-url-custom {{ $errors->has('url') ? ' has-error' : '' }}">
                            <label for="url" class="col-sm-3 control-label">Custom URL</label>
                            <div class="col-sm-9">
                                {!! Form::text('url',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Custom URL'])  !!}
                                @if ($errors->has('url'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('url') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      @endif
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> Visibility</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {!!  old('hidden') != '1' || $nav_info->hidden != 1?'checked':'' !!}  name="hidden"  value="0" class="minimal" >
                                    Show
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {!!  old('hidden') == '1' || $nav_info->hidden == 1?'checked':'' !!}  name="hidden" value="1" class="minimal" >
                                    Hide
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
                             <a href="{{ action('NavigationController@index') }}" class="btn btn-default">Cancel</a>
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
            $('input[name=url_type]:radio').on('ifChecked', function(event) {
                var value = $(this).val();
                 if(value.trim() == 'page'){
                    $('.hidden-url-page').show();
                    $('.hidden-url-custom').hide();
                }else {
                    $('.hidden-url-page').hide();
                    $('.hidden-url-custom').show();
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
