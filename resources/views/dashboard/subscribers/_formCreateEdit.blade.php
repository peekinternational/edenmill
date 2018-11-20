@include('dashboard.partials.formErrorMessage')
<div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
    <label for="name" class="col-sm-3 control-label">Name <span>*</span></label>
    <div class="col-sm-9">
        {!! Form::text('name',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Name','required'=>true,'autofocus'=>true])  !!}
        @if ($errors->has('name'))
            <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
    <label for="email" class="col-sm-3 control-label">Email <span>*</span></label>
    <div class="col-sm-9">
        {!! Form::email('email',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Email','required'=>true])  !!}
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
    <label for="phone" class="col-sm-3 control-label">Phone <span>*</span></label>
    <div class="col-sm-9">
        {!! Form::text('phone',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Phone'])  !!}
        @if ($errors->has('phone'))
            <span class="help-block">
                <strong>{{ $errors->first('phone') }}</strong>
            </span>
        @endif
    </div>
</div>
