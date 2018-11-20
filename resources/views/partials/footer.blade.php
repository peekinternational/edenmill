<div class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }}">
    <footer class="page_footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8">
                    @foreach($navs as $nav)
                        @if(!in_array($nav->slug,['blog','home','about-us']))
                            @if($nav->slug=='shop')
                            <div class="a-footer-menu a-heading-shop">
                               <ul>
                                    <li class="a-menu-heading"><a href="{{ action('ProductController@index') }}">{{ $nav->title }}</a></li>
                                    @foreach($nav->sub_navs as $sub_nav)
                                        <li><a href="{{ url('/shop/'.$sub_nav->slug) }}">{{ $sub_nav->title }}</a></li>
                                   @endforeach
                                </ul>
                            </div>
                            @else
                                @if($nav->sub_navs->count()>0)
                                    <div class="a-footer-menu a-heading-eat">
                                        <ul>

                                            <li class="a-menu-heading"><a href="#">{{ $nav->title }}</a></li>
                                                @foreach($nav->sub_navs as $sub_nav)
                                                    <?php
                                                    $url = '#';
                                                    if(isset($sub_nav->page->slug)){
                                                        $url = url($sub_nav->page->slug.'/page');
                                                    }
                                                    if(!empty($sub_nav->url) && filter_var($sub_nav->url,FILTER_VALIDATE_URL) == true){
                                                        $url = $sub_nav->url;
                                                    }
                                                    ?>
                                                    <li><a href="{{ $url }}">{{ $sub_nav->title }}</a></li>
                                                @endforeach
                                        </ul>
                                    </div>
                                @endif
                            @endif
                        @endif
                    @endforeach
                            {{--<div class="a-footer-menu a-heading-eat">
                                <ul>
                                    <li class="a-menu-heading"><a href="#">Eat</a></li>
                                    <li><a href="#">Cafe</a></li>
                                    <li><a href="#">Functions</a></li>
                                    <li><a href="#">Catering</a></li>
                                    <li><a href="#">Recipes</a></li>
                                </ul>
                            </div>
                            <div class="a-footer-menu a-heading-play">
                                <ul>
                                    <li class="a-menu-heading"><a href="#play">Play</a></li>
                                    <li><a href="#">Soft Play</a></li>
                                    <li><a href="#">Birthday Parties</a></li>
                                    <li><a href="#">Outdoor Animals</a></li>
                                    <li><a href="#">Outdoor Play</a></li>
                                </ul>
                            </div>
                            <div class="a-footer-menu a-heading-rest">
                                <ul>
                                    <li class="a-menu-heading"><a href="#">Rest</a></li>
                                    <li><a href="#">Bunkhouse</a></li>
                                    <li><a href="#">Wigwams</a></li>
                                    <li><a href="#">Video button </a></li>
                                    <li><a href="#">Location</a></li>
                                    <li><a href="#">Awards</a></li>
                                    <li><a href="#">Newsletter Sign Up </a></li>
                                    <li><a href="#">Offers/Special Events</a></li>
                                </ul>
                            </div>
                            <div class="a-footer-menu a-heading-walk">
                                <ul>
                                    <li class="a-menu-heading"><a href="#">Walk</a></li>
                                    <li><a href="#">John Muir Way</a></li>
                                </ul>
                            </div>--}}
                            <div class="a-footer-menu a-heading-eat">
                                <ul>
                                    <li class="a-menu-heading"><a href="#">Other</a></li>
                                    <li><a href="#">Videos</a></li>
                                    <li><a href="#">Location</a></li>
                                    <li><a href="#">Newsletter Signup</a></li>
                                    <li><a href="#">Offers/Special events</a></li>
                                    <li><a href="{{ url('shop/gift-vouchers') }}">Gift Vouchers</a></li>
                                </ul>
                            </div>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <div class="widget widget_mailchimp">
                        <h3 class="widget-title" style="margin-bottom: 10px">Newsletter</h3>
                        <p class="widget_mailchimp__text">Subscribe to our Newsletter right now to be updated. We promice not to spam!</p>
                        {!! Form::open(['action'=>['SubscriberController@store'],'method'=>'post','class'=>'signup']) !!}
                            <div class="form-group">
                                <input name="name" type="text" class="form-control" placeholder="Full Name" required>
                            </div>
                            <div class="form-group">
                                <input name="phone" type="text" class="form-control" placeholder="Phone">
                            </div>
                            <div class="form-group">
                                <input name="email" type="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-success">Subscribe</button>
                            </div>
                            {{--<div class="form-group">
                                <input name="email" type="email" class="mailchimp_email form-control" placeholder="Full Name">
                            </div>

                            <button type="submit" class="widget_mailchimp__button">Subscribe</button>
                            <div class="response"></div>--}}
                       {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>