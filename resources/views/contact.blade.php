@extends('master')
@section('breadcrumb')
    @include('partials.breadcrumb')
@stop
@section('content')
<div class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} home_contact-bg contact-01 section_padding_top_60 section_padding_bottom_50">
   <div class="container">
        <div class="row">
            <?php
            $site_addresses = explode('|',(isset($site['address']['value'])?$site['address']['value']:''));
            $site_phone = explode('|',(isset($site['phone']['value'])?$site['phone']['value']:''));
            $site_emails = explode('|',(isset($site['email']['value'])?$site['email']['value']:''));
            ?>
            @if(isset($site_addresses) && is_array($site_addresses) && count($site_addresses)>0)
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <h3 class="contact-01__title title-green">Address</h3>
                    @foreach($site_addresses as $address)
                        <p class="contact-01__content">{{ $address }}</p>
                    @endforeach
                </div>
            @endif
            @if(isset($site['working_hours']['value']))
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <h3 class="contact-01__title title-yellow">Hours</h3>
                    <p class="contact-01__content">
                       {{ $site['working_hours']['value'] }}
                    </p>
                </div>
            @endif
            @if(isset($site_phone) && is_array($site_phone) && count($site_phone)>0)
            <div class="col-lg-3 col-md-3 col-sm-3">
                <h3 class="contact-01__title title-orange">Phone</h3>
                @foreach($site_phone as $phone)
                <p class="contact-01__content">
                    <a href="callto:">{{ $phone }}</a>
                </p>
                @endforeach
            </div>
            @endif
            @if(isset($site_emails) && is_array($site_emails) && count($site_emails)>0)
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <h3 class="contact-01__title title-red">Email</h3>
                    @foreach($site_emails as $email)
                        <a class="contact-01__content contact-01__phone" href="#">{{ $email }}</a>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>
@stop