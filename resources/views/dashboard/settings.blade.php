@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            {!! Form::open(['action'=>['SettingsController@updateSettings'],'method'=>'post','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
            <div class="box-header with-border">
                <h3 class="box-title">Site Settings</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        <div class="col-sm-offset-3">
                            <strong>Note:</strong>
                        <ul>
                            <li>In case of multiple use pipe "|" symbol between two addresses.</li>
                            <li>First email,phone and address will be the main email,phone and address of the site</li>
                        </ul>
                        </div>
                        <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }}">
                            <label for="address" class="col-sm-3 control-label">Site Address</label>
                            <div class="col-sm-9">
                                {!! Form::textarea('address',$value= (isset($site['address']['value'])?$site['address']['value']:''), $attributes = ['class'=>'form-control','address'=>'address','placeholder'=>'Site Address','rows'=>3])  !!}
                                @if ($errors->has('address'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-sm-3 control-label">Site Email</label>
                            <div class="col-sm-9">
                                {!! Form::textarea('email',$value= (isset($site['email']['value'])?$site['email']['value']:''), $attributes = ['class'=>'form-control','id'=>'site_email','placeholder'=>'Site Email','rows'=>3])  !!}
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="phone" class="col-sm-3 control-label">Site Phone</label>
                            <div class="col-sm-9">
                                {!! Form::textarea('phone',$value= (isset($site['phone']['value'])?$site['phone']['value']:''), $attributes = ['class'=>'form-control','id'=>'phone','placeholder'=>'Site Phone','rows'=>3])  !!}
                                @if ($errors->has('phone'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('working_hours') ? ' has-error' : '' }}">
                            <label for="working_hours" class="col-sm-3 control-label">Working Hours</label>
                            <div class="col-sm-9">
                                {!! Form::text('working_hours',$value= (isset($site['working_hours']['value'])?$site['working_hours']['value']:''), $attributes = ['class'=>'form-control','id'=>'site_phone','placeholder'=>'Working Hours','rows'=>3])  !!}
                                @if ($errors->has('working_hours'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('working_hours') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <h3 class="text-center">Payment Settings</h3>
                        <div class="form-group {{ $errors->has('sandbox') ? ' has-error' : '' }}">
                            <label for="sandbox" class="col-sm-3 control-label">Paypal Sandbox</label>
                            <div class="col-sm-9">
                                {!! Form::text('sandbox',$value= (isset($PaymentSettings['sandbox']['value'])?$PaymentSettings['sandbox']['value']:''), $attributes = ['class'=>'form-control','id'=>'sandbox','placeholder'=>'Sandbox Facilitator Account','rows'=>3])  !!}
                                @if ($errors->has('sandbox'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sandbox') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('live') ? ' has-error' : '' }}">
                            <label for="live" class="col-sm-3 control-label">Paypal Live Account</label>
                            <div class="col-sm-9">
                                {!! Form::text('live',$value= (isset($PaymentSettings['live']['value'])?$PaymentSettings['live']['value']:''), $attributes = ['class'=>'form-control','id'=>'sandbox','placeholder'=>'Paypal Live Account','rows'=>3])  !!}
                                @if ($errors->has('live'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('live') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> Payment Mood</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ (isset($PaymentSettings['payment_mood']['value']) && trim($PaymentSettings['payment_mood']['value'])=='live' ?'checked':'') }} name="payment_mood" value="live" class="minimal" >
                                    Live
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ (isset($PaymentSettings['payment_mood']['value']) && trim($PaymentSettings['payment_mood']['value'])!='live' ?'checked':'') }} name="payment_mood" value="sandbox" class="minimal" >
                                    Sandbox
                                </label>
                            </div>
                        </div>

                        <hr>
                        <h3 class="text-center">Site Social Accounts</h3>
                        <div class="form-group {{ $errors->has('facebook') ? ' has-error' : '' }}">
                            <label for="facebook" class="col-sm-3 control-label">Facebook</label>
                            <div class="col-sm-9">
                                {!! Form::text('facebook',$value= (isset($site['facebook']['value'])?$site['facebook']['value']:''), $attributes = ['class'=>'form-control','id'=>'facebook','placeholder'=>'Facebook'])  !!}
                                @if ($errors->has('facebook'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('facebook') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hide Facebook</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ (isset($site['hide_facebook']['value']) && trim($site['hide_facebook']['value'])=='1' ?'checked':'') }} name="hide_facebook" value="1" class="minimal" >
                                    Yes
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ (isset($site['hide_facebook']['value']) && trim($site['hide_facebook']['value'])!='1' ?'checked':'') }} name="hide_facebook" value="0" class="minimal" >
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('twitter') ? ' has-error' : '' }}">
                            <label for="twitter" class="col-sm-3 control-label">Twitter</label>
                            <div class="col-sm-9">
                                {!! Form::text('twitter',$value= (isset($site['twitter']['value'])?$site['twitter']['value']:''), $attributes = ['class'=>'form-control','id'=>'twitter','placeholder'=>'Twitter'])  !!}
                                @if ($errors->has('twitter'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('twitter') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hide Twitter</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ (isset($site['hide_twitter']['value']) && trim($site['hide_twitter']['value'])=='1' ?'checked':'') }} name="hide_twitter" value="1" class="minimal" >
                                    Yes
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ (isset($site['hide_twitter']['value']) && trim($site['hide_twitter']['value'])!='1' ?'checked':'') }} name="hide_twitter" value="0" class="minimal" >
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('google_plus') ? ' has-error' : '' }}">
                            <label for="google_plus" class="col-sm-3 control-label">Google Plus</label>
                            <div class="col-sm-9">
                                {!! Form::text('google_plus',$value= (isset($site['google_plus']['value'])?$site['google_plus']['value']:''), $attributes = ['class'=>'form-control','id'=>'google_plus','placeholder'=>'Google Plus'])  !!}
                                @if ($errors->has('google_plus'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('google_plus') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hide Google Plus</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ (isset($site['hide_google_plus']['value']) && trim($site['hide_google_plus']['value'])=='1' ?'checked':'') }} name="hide_google_plus" value="1" class="minimal" >
                                    Yes
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ (isset($site['hide_google_plus']['value']) && trim($site['hide_google_plus']['value'])!='1' ?'checked':'') }} name="hide_google_plus" value="0" class="minimal" >
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('google_plus') ? ' has-error' : '' }}">
                            <label for="linkdin" class="col-sm-3 control-label">Linkdin</label>
                            <div class="col-sm-9">
                                {!! Form::text('linkdin',$value= (isset($site['linkdin']['value'])?$site['linkdin']['value']:''), $attributes = ['class'=>'form-control','id'=>'linkdin','placeholder'=>'Linkdin'])  !!}
                                @if ($errors->has('linkdin'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('linkdin') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hide Linkdin</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ (isset($site['hide_linkdin']['value']) && trim($site['hide_linkdin']['value'])=='1' ?'checked':'') }} name="hide_linkdin" value="1" class="minimal" >
                                    Yes
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ (isset($site['hide_linkdin']['value']) && trim($site['hide_linkdin']['value'])!='1' ?'checked':'') }} name="hide_linkdin" value="0" class="minimal" >
                                    No
                                </label>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('flickr') ? ' has-error' : '' }}">
                            <label for="flickr" class="col-sm-3 control-label">Flickr</label>
                            <div class="col-sm-9">
                                {!! Form::text('flickr',$value= (isset($site['flickr']['value'])?$site['flickr']['value']:''), $attributes = ['class'=>'form-control','id'=>'flickr','placeholder'=>'Flickr'])  !!}
                                @if ($errors->has('flickr'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('flickr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hide Flickr</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ (isset($site['hide_flickr']['value']) && trim($site['hide_flickr']['value'])=='1' ?'checked':'') }} name="hide_flickr" value="1" class="minimal" >
                                    Yes
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ (isset($site['hide_flickr']['value']) && trim($site['hide_flickr']['value'])!='1' ?'checked':'') }} name="hide_flickr" value="0" class="minimal" >
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('instagram') ? ' has-error' : '' }}">
                            <label for="instagram" class="col-sm-3 control-label">Instagram</label>
                            <div class="col-sm-9">
                                {!! Form::text('instagram',$value= (isset($site['instagram']['value'])?$site['instagram']['value']:''), $attributes = ['class'=>'form-control','id'=>'instagram','placeholder'=>'Instagram'])  !!}
                                @if ($errors->has('instagram'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('instagram') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hide Instagram</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ (isset($site['hide_instagram']['value']) && trim($site['hide_instagram']['value'])=='1' ?'checked':'') }} name="hide_instagram" value="1" class="minimal" >
                                    Yes
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ (isset($site['hide_instagram']['value']) && trim($site['hide_instagram']['value'])!='1' ?'checked':'') }} name="hide_instagram" value="0" class="minimal" >
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('youtube') ? ' has-error' : '' }}">
                            <label for="youtube" class="col-sm-3 control-label">Youtube</label>
                            <div class="col-sm-9">
                                {!! Form::text('youtube',$value= (isset($site['youtube']['value'])?$site['youtube']['value']:''), $attributes = ['class'=>'form-control','id'=>'youtube','placeholder'=>'Youtube'])  !!}
                                @if ($errors->has('youtube'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('youtube') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hide Youtube</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ (isset($site['hide_youtube']['value']) && trim($site['hide_youtube']['value'])=='1' ?'checked':'') }} name="hide_youtube" value="1" class="minimal" >
                                    Yes
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ (isset($site['hide_youtube']['value']) && trim($site['hide_youtube']['value'])!='1' ?'checked':'') }} name="hide_youtube" value="0" class="minimal" >
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('tripadvisor') ? ' has-error' : '' }}">
                            <label for="skype" class="col-sm-3 control-label">Trip Advisor</label>
                            <div class="col-sm-9">
                                {!! Form::text('tripadvisor',$value= (isset($site['tripadvisor']['value'])?$site['tripadvisor']['value']:''), $attributes = ['class'=>'form-control','id'=>'tripadvisor','placeholder'=>'Tripadvisor'])  !!}
                                @if ($errors->has('tripadvisor'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tripadvisor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hide Trip Advisor</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ (isset($site['hide_tripadvisor']['value']) && trim($site['hide_tripadvisor']['value'])=='1' ?'checked':'') }} name="hide_tripadvisor" value="1" class="minimal" >
                                    Yes
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ (isset($site['hide_tripadvisor']['value']) && trim($site['hide_tripadvisor']['value'])!='1' ?'checked':'') }} name="hide_tripadvisor" value="0" class="minimal" >
                                    No
                                </label>
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('skype') ? ' has-error' : '' }}">
                            <label for="skype" class="col-sm-3 control-label">Skype</label>
                            <div class="col-sm-9">
                                {!! Form::text('skype',$value= (isset($site['skype']['value'])?$site['skype']['value']:''), $attributes = ['class'=>'form-control','id'=>'skype','placeholder'=>'Skype'])  !!}
                                @if ($errors->has('youtube'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('skype') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Hide Skype</label>
                            <div class="col-sm-9" style="padding-top: 5px;">
                                <label>
                                    <input type="radio" {{ (isset($site['hide_skype']['value']) && trim($site['hide_skype']['value'])=='1' ?'checked':'') }} name="hide_skype" value="1" class="minimal" >
                                    Yes
                                </label>
                                &nbsp;
                                <label>
                                    <input type="radio" {{ (isset($site['hide_skype']['value']) && trim($site['hide_skype']['value'])!='1' ?'checked':'') }} name="hide_skype" value="0" class="minimal" >
                                    No
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        <span class="pull-right">
                             <button type="submit" class="btn btn-info ">Save</button>
                        </span>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@stop

