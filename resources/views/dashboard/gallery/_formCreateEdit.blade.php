@include('dashboard.partials.formErrorMessage')
<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="title" class="col-sm-3 control-label">Title <span>*</span></label>
    <div class="col-sm-9">
        {!! Form::text('title',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Title','required'=>true,'autofocus'=>true])  !!}
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
<div class="form-group {{ $errors->has('link') ? ' has-error' : '' }}">
    <label for="company_name" class="col-sm-3 control-label">Button link </label>
    <div class="col-sm-9">
        {!! Form::text('link',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Link'])  !!}
        @if ($errors->has('link'))
            <span class="help-block">
                <strong>{{ $errors->first('link') }}</strong>
            </span>
        @endif
    </div>
</div>

