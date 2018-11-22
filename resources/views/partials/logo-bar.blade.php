


 
<div id="home" class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} page_toplogo">
    <div class="container-fluid">
         <div class="col-lg-offset-4 col-lg-4 col-md-3 col-sm-4 text-sm-center text-right" style="padding-top: 4px">
                    {!! Form::open(['route' => 'search','class'=>'searchform search-form','method'=>'get']) !!}
                    <input type="text" value="{{ ((isset($_GET['q']) && !empty($_GET['q'])?$_GET['q']:'')) }}" name="q" class="search-form__search form-control"
                           placeholder="Search keyword" id="modal-search-input">
                    <button type="submit" class="search-form__button">Search</button>
                    {!! Form::close() !!}

                    <div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal"
                         id="search_modal"></div>
                </div>

        <!-- <div class="col-lg-4 col-md-4 col-sm-12 text-md-center">
            <div class="contact-info">
                <?php
                    $site_addresses = explode('|',(isset($site['address']['value'])?$site['address']['value']:''));
                    $site_phone = explode('|',(isset($site['phone']['value'])?$site['phone']['value']:''));
                ?>
                @if(isset($site_addresses) && is_array($site_addresses) && count($site_addresses)>0)
                    <p class="contact-info__address">{{ $site_addresses[0] }}</p>
                @endif
                @if(isset($site_phone) && is_array($site_phone) && count($site_phone)>0)
                    <p class="contact-info__phone">
                        <span>{{ substr(trim($site_phone[0]),0,4) }}</span> {{ substr($site_phone[0],4,strlen(trim($site_phone[0]))) }}
                    </p>
                @endif
                @if(isset($site['working_hours']['value']))
                    <p class="contact-info__work-time">
                        {{ $site['working_hours']['value'] }}
                    </p>
                @endif
                @if(Auth::check() && Auth::user()->hasRole('admin'))
                        <p>
                            <a href="{{ url('/dashboard') }}">Dashboard</a>
                            - <a href="{{ url('/logout') }}">Logout</a>
                        </p>
                @endif
            </div>
        </div> -->
        <div class="col-lg-4 col-md-4 col-sm-8 text-md-center text-right">
            <ul class="social-list">
                    @if(isset($site['facebook']['value']) && (!isset($site['hide_facebook']['value']) || $site['hide_facebook']['value']!='1'))
                        <li>
                            <a href="{{ $site['facebook']['value'] }}">
                                <i class="fa fa-facebook-f"></i>
                            </a>
                        </li>
                    @endif
                    @if(isset($site['twitter']['value']) && (!isset($site['hide_twitter']['value']) || $site['hide_twitter']['value']!='1'))
                        <li>
                            <a href="{{ $site['twitter']['value'] }}">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                    @endif
                    @if(isset($site['google_plus']['value']) && (!isset($site['hide_google_plus']['value']) || $site['hide_google_plus']['value']!='1'))
                        <li>
                            <a href="{{ $site['google_plus']['value'] }}">
                                <i class="fa fa-google-plus"></i>
                            </a>
                        </li>
                    @endif
                    @if(isset($site['linkedin']['value']) && (!isset($site['hide_linkedin']['value']) || $site['hide_linkedin']['value']!='1'))
                        <li>
                            <a href="{{ $site['linkedin']['value'] }}">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    @endif
                    @if(isset($site['flickr']['value']) && (!isset($site['hide_flickr']['value']) || $site['hide_flickr']['value']!='1'))
                        <li>
                            <a href="{{ $site['flickr']['value'] }}">
                                <i class="fa fa-flickr"></i>
                            </a>
                        </li>
                    @endif
                    @if(isset($site['instagram']['value']) && (!isset($site['hide_instagram']['value']) || $site['hide_instagram']['value']!='1'))
                        <li>
                            <a href="{{ $site['instagram']['value'] }}">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                    @endif
                    @if(isset($site['youtube']['value']) && (!isset($site['hide_youtube']['value']) || $site['hide_youtube']['value']!='1'))
                        <li>
                            <a href="{{ $site['youtube']['value'] }}">
                                <i class="fa fa-youtube"></i>
                            </a>
                        </li>
                    @endif
                    @if(isset($site['skype']['value']) && (!isset($site['hide_skype']['value']) || $site['hide_skype']['value']!='1'))
                        <li>
                            <a href="skype:{{$site['skype']['value']}}">
                                <i class="fa fa-skype"></i>
                            </a>
                        </li>
                    @endif
                    @if(isset($site['tripadvisor']['value']) && (!isset($site['hide_tripadvisor']['value']) || $site['hide_tripadvisor']['value']!='1'))
                        <li>
                            <a href="{{$site['tripadvisor']['value']}}">
                                <i class="fa fa-tripadvisor"></i>
                            </a>
                        </li>
                    @endif
            </ul>
        </div>
        
    </div>
</div>