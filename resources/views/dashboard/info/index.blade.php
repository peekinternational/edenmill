@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Web Site Information</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div>
                    {!! Form::open(['action'=>['SettingsController@postInfo'],'method'=>'post','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
                        <div class="form-group">
                            <label  class="col-sm-3 control-label" for="contact_type">Info Type</label>
                            <div class="col-sm-6">
                                <select name="contact_type" class="form-control" id="contact_type">
                                    <option value="">--- Select Info Type --- </option>
                                    <option value="address">Address</option>
                                    <option value="email">Email</option>
                                    <option value="phone">Phone</option>
                                    <option value="time">Working Hours</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label" for="title">Title</label>
                            <div class="col-sm-6">
                                {!! Form::text('title',$value = null, $attributes = ['class'=>'form-control','placeholder'=>'Title'])  !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-3 control-label" for="value">Value</label>
                            <div class="col-sm-6">
                                {!! Form::text('value',$value = null, $attributes = ['class'=>'form-control','placeholder'=>'Value'])  !!}
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
    <script>
        $(document).ready(function(){

        });
    </script>
@stop
