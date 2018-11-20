@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">New Navigation</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('NavigationController@index') }}" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Navigation list">
                        <i class="fa fa-list"></i></a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::open(['action'=>['NavigationController@store'],'method'=>'post','class'=>'form-horizontal']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        @include('dashboard.partials.formErrorMessage')
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> Navigation Type</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ old('type') != 'sub-menu'?'checked':'' }} name="type"  value="main-menu" class="minimal" >
                                    Main Menu
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio"  name="type" {{ old('type') == 'sub-menu'?'checked':'' }} value="sub-menu" class="minimal" >
                                    Sub Menu
                                </label>
                            </div>
                        </div>
                        <div {!!  old('type') != 'sub-menu'?'style="display: none;"':'' !!}   class="form-group hidden-main-menu {{ $errors->has('nav_id') ? ' has-error' : '' }}">
                            <label for="nav_id" class="col-sm-3 control-label">Parent Navigation</label>
                            <div class="col-sm-9">
                                <select name="nav_id" style="width: 100%" id="nav_id" class="select2">
                                    <option value="0">--- Select Parent Navigation ---</option>
                                    @foreach($navs as $key=>$nav)
                                        @if(!in_array($nav->slug,['home','about-us','blog']))
                                            <option {!!  old('nav_id')==$nav->id?'selected="selected"':'' !!} data-slug="{{ $nav->slug }}"  value="{{ $nav->id }}">{{ $nav->title }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('nav_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nav_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @include('dashboard.navigation._formCreateEdit')
                        <div class="form-group hide-url-inputs">
                            <label class="col-sm-3 control-label"> Url</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {!!  old('url_type') != 'custom'?'checked':'' !!}  name="url_type"  value="page" class="minimal" >
                                    Site Page
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {!!  old('url_type') == 'custom'?'checked':'' !!}  name="url_type" value="custom" class="minimal" >
                                    Custom URL
                                </label>
                            </div>
                        </div>
                        <div {!!  old('url_type') == 'custom'?'style="display:none"':'' !!} class="form-group hide-url-inputs hidden-url-page {{ $errors->has('page_id') ? ' has-error' : '' }}">
                            <label for="page_id" class="col-sm-3 control-label">Navigation Page</label>
                            <div class="col-sm-9">
                                <select name="page_id" style="width: 100%" id="page_id" class="select2">
                                    <option value="0">--- Select Navigation Page ---</option>
                                    @if($pages->count()>0)
                                        @foreach($pages as $id=>$page)
                                            <option {{ old('page_id')==$id?'selected':'' }} value="{{ $id }}">{{ $page }}</option>
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
                        <div {!!  old('url_type') != 'custom'?'style="display: none"':'' !!}  class="form-group hide-url-inputs hidden-url-custom {{ $errors->has('url') ? ' has-error' : '' }}">
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
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> Visibility</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {!!  old('hidden') != '1'?'checked':'' !!}  name="hidden"  value="0" class="minimal" >
                                    Show
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {!!  old('hidden') == '1'?'checked':'' !!}  name="hidden" value="1" class="minimal" >
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
                             <button type="reset" class="btn btn-default">Cancel</button>
                             &nbsp;
                             <button type="submit" class="btn btn-info ">Add</button>
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
            $(document.body).on("change","#nav_id",function(){
                var value = $('select option[value='+this.value+']').attr('data-slug').trim();
                switch (value){
                    case 'shop':
                    case 'about-us':
                    case 'home':
                    case 'blog':
                         $('.hide-url-inputs').hide();
                        break;
                    default:
                        $('.hide-url-inputs').show();
                        if($('input[name=url_type]:checked').val() == 'page'){
                            $('.hidden-url-custom').hide();
                        }else if($('input[name=url_type]:checked').val() == 'custom'){
                            $('.hidden-url-page').hide();
                        }

                }
            });

            $('input[name=type]:radio').on('ifChecked', function(event) {
                var value = $(this).val();
                if(value.trim() == 'sub-menu'){
                    $('.hidden-sub-menu').hide();
                    $('.hidden-main-menu').show();
                }else{
                    $('.hidden-sub-menu').show();
                    $('.hidden-main-menu').hide();
                }
            });
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
