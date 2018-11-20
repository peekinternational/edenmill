@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Site Theme Settings</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div>
                    {!! Form::open(['action'=>['SettingsController@update_theme'],'method'=>'post','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Theme</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    {!! Form::radio('theme','ls', (isset($theme['theme']['value']) && $theme['theme']['value']=='ls') ,$attributes = ['class'=>'minimal'])  !!}
                                    Light
                                </label>
                                &nbsp;
                                <label>
                                    {!! Form::radio('theme','ds', ((isset($theme['theme']['value']) && $theme['theme']['value']=='ds') || (!isset($theme['theme']['value']))) ,$attributes = ['class'=>'minimal'])  !!}
                                    Dark
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Layout</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    {!! Form::radio('layout','1', (isset($theme['layout']['value']) && $theme['layout']['value']=='1') ,$attributes = ['class'=>'minimal'])  !!}
                                    Boxed
                                </label>
                                &nbsp;
                                <label>
                                    {!! Form::radio('layout','0', ((isset($theme['layout']['value']) && $theme['layout']['value']=='0') || (!isset($theme['layout']['value']))) ,$attributes = ['class'=>'minimal'])  !!}
                                    Flexed
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Margins</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    {!! Form::radio('margin','1', (isset($theme['margin']['value']) && $theme['margin']['value']=='1') ,$attributes = ['class'=>'minimal'])  !!}
                                    Yes
                                </label>
                                &nbsp;
                                <label>
                                    {!! Form::radio('margin','0', ((isset($theme['margin']['value']) && $theme['margin']['value']=='0') || (!isset($theme['margin']['value']))) ,$attributes = ['class'=>'minimal'])  !!}
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('pattern') ? ' has-error' : '' }}">
                            <label for="pattern" class="col-sm-3 control-label">Pattern</label>
                            <div class="col-sm-6">
                                <label class="text-center">
                                    {!! Form::radio('pattern','pattern0', ((isset($theme['pattern']['value']) && $theme['pattern']['value']=='pattern0') || (!isset($theme['pattern0']['value']))) ,$attributes = ['class'=>'minimal'])  !!}
                                    <br />
                                    <img style="width: 82px; height: 82px" src="{{ asset('assets/img/pattern0.png') }}" class="img-thumbnail img-responsive" alt="">
                                </label>
                                <label class="text-center">
                                    {!! Form::radio('pattern','pattern1', ((isset($theme['pattern']['value']) && $theme['pattern']['value']=='pattern1')) ,$attributes = ['class'=>'minimal'])  !!}
                                    <br />
                                    <img style="width: 82px; height: 82px" src="{{ asset('assets/img/pattern1.png') }}" class="img-thumbnail img-responsive" alt="">
                                </label>
                                <label class="text-center">
                                    {!! Form::radio('pattern','pattern2', ((isset($theme['pattern']['value']) && $theme['pattern']['value']=='pattern2')) ,$attributes = ['class'=>'minimal'])  !!}
                                    <br />
                                    <img style="width: 82px; height: 82px" src="{{ asset('assets/img/pattern2.png') }}" class="img-thumbnail img-responsive" alt="">
                                </label>
                                <label class="text-center">
                                    {!! Form::radio('pattern','pattern3', ((isset($theme['pattern']['value']) && $theme['pattern']['value']=='pattern3')) ,$attributes = ['class'=>'minimal'])  !!}
                                    <br />
                                    <img style="width: 82px; height: 82px" src="{{ asset('assets/img/pattern3.png') }}" class="img-thumbnail img-responsive" alt="">
                                </label>
                                <label class="text-center">
                                    {!! Form::radio('pattern','pattern4', ((isset($theme['pattern']['value']) && $theme['pattern']['value']=='pattern4')) ,$attributes = ['class'=>'minimal'])  !!}
                                    <br />
                                    <img style="width: 82px; height: 82px" src="{{ asset('assets/img/pattern4.png') }}" class="img-thumbnail img-responsive" alt="">
                                </label>
                                <label class="text-center">
                                    {!! Form::radio('pattern','pattern5', ((isset($theme['pattern']['value']) && $theme['pattern']['value']=='pattern5')) ,$attributes = ['class'=>'minimal'])  !!}
                                    <br />
                                    <img style="width: 82px; height: 82px" src="{{ asset('assets/img/pattern5.png') }}" class="img-thumbnail img-responsive" alt="">
                                </label>
                                <label class="text-center">
                                    {!! Form::radio('pattern','pattern6', ((isset($theme['pattern']['value']) && $theme['pattern']['value']=='pattern6')) ,$attributes = ['class'=>'minimal'])  !!}
                                    <br />
                                    <img style="width: 82px; height: 82px" src="{{ asset('assets/img/pattern6.png') }}" class="img-thumbnail img-responsive" alt="">
                                </label>
                                <label class="text-center">
                                    {!! Form::radio('pattern','pattern7', ((isset($theme['pattern']['value']) && $theme['pattern']['value']=='pattern7')) ,$attributes = ['class'=>'minimal'])  !!}
                                    <br />
                                    <img style="width: 82px; height: 82px" src="{{ asset('assets/img/pattern7.png') }}" class="img-thumbnail img-responsive" alt="">
                                </label>
                                <label class="text-center">
                                    {!! Form::radio('pattern','pattern8', ((isset($theme['pattern']['value']) && $theme['pattern']['value']=='pattern8')) ,$attributes = ['class'=>'minimal'])  !!}
                                    <br />
                                    <img style="width: 82px; height: 82px" src="{{ asset('assets/img/pattern8.png') }}" class="img-thumbnail img-responsive" alt="">
                                </label>
                                <label class="text-center">
                                    {!! Form::radio('pattern','pattern9', ((isset($theme['pattern']['value']) && $theme['pattern']['value']=='pattern9')) ,$attributes = ['class'=>'minimal'])  !!}
                                    <br />
                                    <img style="width: 82px; height: 82px" src="{{ asset('assets/img/pattern9.png') }}" class="img-thumbnail img-responsive" alt="">
                                </label>
                                <label class="text-center">
                                    {!! Form::radio('pattern','pattern10', ((isset($theme['pattern']['value']) && $theme['pattern']['value']=='pattern10')) ,$attributes = ['class'=>'minimal'])  !!}
                                    <br />
                                    <img style="width: 82px; height: 82px" src="{{ asset('assets/img/pattern10.png') }}" class="img-thumbnail img-responsive" alt="">
                                </label>
                                <label class="text-center">
                                    {!! Form::radio('pattern','pattern11', ((isset($theme['pattern']['value']) && $theme['pattern']['value']=='pattern11')) ,$attributes = ['class'=>'minimal'])  !!}
                                    <br />
                                    <img style="width: 82px; height: 82px" src="{{ asset('assets/img/pattern11.png') }}" class="img-thumbnail img-responsive" alt="">
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-3" style="padding-top: 5px;">
                                <hr>
                                <span class="pull-right">
                                        <button type="submit" class="btn btn-success">Save</button>
                                </span>
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- /.box -->
    </section>
@stop
@section('footer')

@stop
