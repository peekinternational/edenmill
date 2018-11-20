@extends('master')
@section('title', 'Registration Page')
@section('content')
    @include('partials.breadcrumb')
    <div class="ls section_padding_top_100 section_padding_bottom_100">
        <div class="container">
            <div class="row">
                <form class="shop-register" role="form" method="POST" action="{{ url('/register') }}">
                    {{ csrf_field() }}
                    <div class="col-sm-6">
                        <div class="form-group validate-required {{ $errors->has('first_name') ? ' has-error' : '' }}" id="billing_first_name_field">
                            <label for="billing_first_name" class="control-label">
                                <span class="grey">First Name </span>
                                <span class="required">*</span>
                            </label>
                            <input type="text"  class="form-control " name="first_name" id="billing_first_name" placeholder="First Name" required>
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}" id="billing_company_field">
                            <label for="billing_company" class="control-label">
                                <span class="grey">Company Name</span>
                            </label>
                            <input type="text" class="form-control " name="company_name" id="billing_company" placeholder="Company Name">
                            @if ($errors->has('company_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group validate-required {{ $errors->has('last_name') ? ' has-error' : '' }}" id="billing_last_name_field">
                            <label for="billing_last_name" class="control-label">
                                <span class="grey">Last Name </span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control " name="last_name" id="billing_last_name" placeholder="Last Name"  required>
                            @if ($errors->has('last_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group validate-required validate-email {{ $errors->has('email') ? ' has-error' : '' }}" id="billing_email_field">
                            <label for="billing_email" class="control-label">
                                <span class="grey">Email Address </span>
                                <span class="required">*</span>
                            </label>
                            <input type="email" class="form-control " name="email" id="billing_email" placeholder="Email" required>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group address-field validate-required {{ $errors->has('address') ? ' has-error' : '' }}" id="billing_address_fields">
                            <label for="billing_address_1" class="control-label">
                                <span class="grey">Address </span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control " name="address" id="billing_address_1" placeholder="Street address" required>
                            @if ($errors->has('address'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group address-field validate-required {{ $errors->has('city') ? ' has-error' : '' }}" id="billing_city_field">
                            <label for="billing_city" class="control-label">
                                <span class="grey">Town / City </span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control " name="city" id="billing_city" placeholder="Town / City" required>
                            @if ($errors->has('city'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group address-field validate-required validate-postcode {{ $errors->has('post_code') ? ' has-error' : '' }}" id="billing_postcode_field">
                            <label for="billing_postcode" class="control-label">
                                <span class="grey">Postcode </span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control " name="post_code" id="billing_postcode" placeholder="Postcode / Zip" required>
                            @if ($errors->has('post_code'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('post_code') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group validate-required validate-phone {{ $errors->has('phone') ? ' has-error' : '' }}" id="billing_phone_field">
                            <label for="billing_phone" class="control-label">
                                <span class="grey">Phone </span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control " name="phone" id="billing_phone" placeholder="Phone" required>
                            @if ($errors->has('phone'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}" id="billing_password_field">
                            <label for="billing_password" class="control-label">
                                <span class="grey">Password</span>
                                <span class="required">*</span>
                            </label>
                            <input type="password" class="form-control " name="password" id="billing_password" placeholder="Password" required>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group ">
                            <div class="radio">
                                <label>
                                    <input type="radio" checked name="address_type" value="1"> Ship to this address
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" name="address_type" value="0"> Ship to different address
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                            <label for="billing_state" class="control-label">
                                <span class="grey">State/Province </span>
                                <span class="required">*</span>
                            </label>
                            <input type="text" class="form-control " name="state" id="billing_state" placeholder="State/Province" required>
                            @if ($errors->has('state'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }}">
                            <label for="billing_country" class="control-label">
                                <span class="grey">Country </span>
                                <span class="required">*</span>
                            </label>
                            <select class="form-control" name="country" id="billing_country" required>
                                @foreach($countries as $key=>$country)
                                    <option {{ strtoupper($key)==='GBR'?'selected="selected"':'' }} value="{{ $key  }}">{{ $country }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('country'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group validate-required validate-fax {{ $errors->has('fax') ? ' has-error' : '' }}" id="billing_fax_field">
                            <label for="billing_fax" class="control-label">
                                <span class="grey">Fax </span>
                            </label>
                            <input type="text" class="form-control " name="fax" id="billing_fax" placeholder="Fax">
                            @if ($errors->has('fix'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('fax') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}" id="billing_password2_field">
                            <label for="billing_password2" class="control-label">
                                <span class="grey">Confirm Password</span>
                                <span class="required">*</span>
                            </label>
                            <input type="password" class="form-control " name="password_confirmation" id="billing_password2" placeholder="Confirmation Password" required>
                            @if ($errors->has('first_name'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <button type="submit" class="button-t1">Register Now</button>
                        <button type="reset" class="button-t1">Clear Form</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    {{--<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection
