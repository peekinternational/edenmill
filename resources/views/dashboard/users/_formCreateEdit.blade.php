@include('dashboard.partials.formErrorMessage')
<div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
    <label for="name" class="col-sm-3 control-label">First Name <span>*</span></label>
    <div class="col-sm-9">
        {!! Form::text('first_name',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'First Name','required'=>true,'autofocus'=>true])  !!}
        @if ($errors->has('first_name'))
            <span class="help-block">
                <strong>{{ $errors->first('first_name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
    <label for="last_name" class="col-sm-3 control-label">Last Name <span>*</span></label>
    <div class="col-sm-9">
        {!! Form::text('last_name',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Last Name','required'=>true])  !!}
        @if ($errors->has('last_name'))
            <span class="help-block">
                <strong>{{ $errors->first('last_name') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}">
    <label for="company_name" class="col-sm-3 control-label">Company Name</label>
    <div class="col-sm-9">
        {!! Form::text('company_name',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Company Name'])  !!}
        @if ($errors->has('company_name'))
            <span class="help-block">
                <strong>{{ $errors->first('company_name') }}</strong>
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
