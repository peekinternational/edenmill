@include('dashboard.partials.formErrorMessage')
<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title" class="col-sm-3 control-label">Title <span>*</span></label>
    <div class="col-sm-9">
        {!! Form::text('title',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Slide Title','required'=>true,'autofocus'=>true])  !!}
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
    <label for="description" class="col-sm-3 control-label">Description <span>*</span></label>
    <div class="col-sm-9">
        {!! Form::textarea('description',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Description','required'=>true])  !!}
        @if ($errors->has('description'))
            <span class="help-block">
                <strong>{{ $errors->first('description') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('link_text') ? ' has-error' : '' }}">
    <label for="link_text" class="col-sm-3 control-label">Button Text</label>
    <div class="col-sm-9">
        {!! Form::text('link_text',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Button Text'])  !!}
        @if ($errors->has('link_text'))
            <span class="help-block">
                <strong>{{ $errors->first('link_text') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('link') ? ' has-error' : '' }}">
    <label for="company_name" class="col-sm-3 control-label">Button link </label>
    <div class="col-sm-9">
        {!! Form::text('link',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Button Link.'])  !!}
        @if ($errors->has('link'))
            <span class="help-block">
                <strong>{{ $errors->first('link') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('order_by') ? ' has-error' : '' }}">
    <label for="order_by" class="col-sm-3 control-label">Order</label>
    <div class="col-sm-9">
        {!! Form::number('order_by',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Slide Display Order'])  !!}
        @if ($errors->has('order_by'))
            <span class="help-block">
                <strong>{{ $errors->first('order_by') }}</strong>
            </span>
        @endif
    </div>
</div>
