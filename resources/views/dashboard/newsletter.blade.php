@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Send NewsLetter</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('SubscriberController@index') }}" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Show Subscribers">
                        <i class="fa fa-list"></i></a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::open(['action'=>['NewsLetterController@send'],'method'=>'post','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-1">
                       @include('dashboard.partials.formErrorMessage')
<div class="form-group {{ $errors->has('subject') ? ' has-error' : '' }}">
    <label for="subject" class="col-sm-3 control-label">Subject <span>*</span></label>
    <div class="col-sm-9">
        {!! Form::text('subject',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Subject','required'=>true,'autofocus'=>true])  !!}
        @if ($errors->has('subject'))
            <span class="help-block">
                <strong>{{ $errors->first('subject') }}</strong>
            </span>
        @endif
    </div>
</div>


<div class="form-group {{ $errors->has('to') ? ' has-error' : '' }}">
    <label for="emails" class="col-sm-3 control-label">To <span>*</span></label>
    <div class="col-sm-9">
        <select name="emails[]" class="" id="emails" multiple>
            @foreach($subscribers as $subscriber)
            <option value="{{ $subscriber->email }}">{{ !empty($subscriber->name)?$subscriber->name:$subscriber->email }}</option>
            @endforeach
        </select>
        @if ($errors->has('to'))
            <span class="help-block">
                <strong>{{ $errors->first('to') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('body') ? ' has-error' : '' }}">
    <label for="to" class="col-sm-3 control-label">Text <span>*</span></label>
    <div class="col-sm-9">
        {!! Form::textarea('body',$value= null, $attributes = ['class'=>'form-control ckeditor','placeholder'=>'Text'])  !!}
        @if ($errors->has('body'))
            <span class="help-block">
                <strong>{{ $errors->first('body') }}</strong>
            </span>
        @endif
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
                             <button type="submit" class="btn btn-info ">Send</button>
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
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-multiselect/jquery.multiselect.css') }}">
@stop
@section('footer')
 <script src="{{ asset('assets/plugins/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/jquery-multiselect/jquery.multiselect.js') }}"></script>
    <script>
$('select[multiple]').multiselect({
    texts: {
        placeholder: 'Select Subscriber'
    },
    selectAll:true
});

       
    </script>
@stop
