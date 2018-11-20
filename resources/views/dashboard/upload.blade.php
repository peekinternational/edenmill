@extends('dashboard.layouts.default') @section('content')
<section class="content">
    <div class="box">
        {!! Form::open(['action'=>['SettingsController@upload'],'method'=>'post','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
        <div class="box-header with-border">
            <h3 class="box-title">Upload Menu & Recipes</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-2">
                    <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                        <label for="type" class="col-sm-3 control-label">Type</label>
                        <div class="col-sm-9" style="padding-top: 5px;">
                            <label>
                                    <input type="radio" checked  name="type" value="1" class="minimal" >
                                    Menu
                                </label> &nbsp;
                            <label>
                                <input type="radio" name="type" value="0" class="minimal" >
                                Recipes
                            </label>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('file') ? ' has-error' : '' }}">
                        <label for="file" class="col-sm-3 control-label">File</label>
                        <div class="col-sm-9">
                            <input type="file" id="file" name="file"> @if ($errors->has('file'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('file') }}</strong>
                                    </span> @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-2">
                    <span class="pull-right">
                             <button type="submit" class="btn btn-info ">Upload</button>
                        </span>
                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</section>
@stop 
@section('footer')
<script>
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
    } catch (e) {
        console.error(e);
    }
</script>

@stop