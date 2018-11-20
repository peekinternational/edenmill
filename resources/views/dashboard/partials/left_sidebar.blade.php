<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/images/users/'.Auth::user()->image)}}" class="img-circle" alt="{{ Auth::user()->photo}}">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li><a href="{{ url('/dashboard') }}"> <i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
            <li class="treeview">
                <a href="{{ action('OrderController@index') }}">
                    <i class="fa fa-cart-plus"></i>
                    <span>Orders</span>
                    @if($OrderCount > 0)
                     <small class="label pull-right bg-red">{{ $OrderCount }}</small>
                    @endif 
                </a>
               
            </li>
            <li>
                <a href="{{ action('GiftVouchersController@index') }}"> 
                    <i class="fa fa-gift"></i> <span>Gift Vouchers</span>
                     @if($GiftOrderCount > 0)
                         <small class="label pull-right bg-red">{{ $GiftOrderCount}}</small>
                    @endif
                </a>
                
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-rss"></i>
                    <span>Blog</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ action('BlogController@create') }}"><i class="fa fa-circle-o"></i> New Post</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Show Posts  <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ action('BlogController@index') }}"><i class="fa fa-angle-double-right"></i> All </a></li>
                            <li><a href="{{ action('BlogController@published') }}"><i class="fa fa-angle-double-right"></i> Published </a></li>
                            <li><a href="{{ action('BlogController@unPublished') }}"><i class="fa fa-angle-double-right"></i> Un-Published </a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th"></i>
                    <span>Products</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ action('ProductController@create') }}"><i class="fa fa-circle-o"></i> New product</a></li>
                    <li><a href="{{ action('ProductController@getIndex') }}"><i class="fa fa-circle-o"></i> View product</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{ action('GalleryController@index') }}">
                    <i class="fa fa-picture-o"></i>
                    <span>Gallery</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ url('/dashboard/upload') }}">
                    <i class="fa fa-upload"></i>
                    <span>Upload</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ url('/dashboard/newsletter') }}">
                    <i class="fa fa-envelope"></i>
                    <span>Send Newsletter</span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-th-large"></i>
                    <span>Product Categories</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ action('CategoryController@create') }}"><i class="fa fa-circle-o"></i> New Category</a></li>
                    <li><a href="{{ action('CategoryController@index') }}"><i class="fa fa-circle-o"></i> Show Categories</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span>Manage Users</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ action('UserController@create') }}"><i class="fa fa-circle-o"></i> New User</a></li>
                    <li><a href="{{ action('SubscriberController@index') }}"><i class="fa fa-circle-o"></i> Subscirbers</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> View Users  <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ action('UserController@index') }}"><i class="fa fa-angle-double-right"></i> All </a></li>
                            <li><a href="{{ action('UserController@index') }}"><i class="fa fa-angle-double-right"></i> Active </a></li>
                            <li><a href="{{ action('UserController@index') }}"><i class="fa fa-angle-double-right"></i> In-Active </a></li>
                        </ul>
                    </li>
                    <li><a href="{{ action('RolesController@index') }}"><i class="fa fa-circle-o"></i> Roles</a></li>

                </ul>
            </li>
            <li class="header">THEME & PAGES</li>
            <li><a href="{{ action('SliderController@index') }}"><i class="fa fa-picture-o"></i> <span>Send Newsletter</span> </a></li>
            <li><a href="{{ action('PagesController@map_page') }}"><i class="fa fa-map-marker"></i> <span>Map</span> </a></li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-columns"></i>
                    <span>Pages</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ action('PagesController@create') }}"><i class="fa fa-circle-o"></i> New Page</a></li>
                    <li><a href="{{ action('PagesController@index') }}"><i class="fa fa-circle-o"></i> View Pages</a></li>
                    <li><a href="{{ action('PagesController@getAboutPage') }}"><i class="fa fa-info"></i> Home About Section </a></li>
                    {{-- <li><a href="{{ action('SliderController@index') }}"><i class="fa fa-angle-double-right"></i> Home Slider </a></li>
 --}}               {{-- <li><a href="{{ action('UserController@create') }}"><i class="fa fa-circle-o"></i> New User</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> View Users  <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="{{ action('UserController@index') }}"><i class="fa fa-angle-double-right"></i> All </a></li>
                            <li><a href="{{ action('UserController@index') }}"><i class="fa fa-angle-double-right"></i> Active </a></li>
                            <li><a href="{{ action('UserController@index') }}"><i class="fa fa-angle-double-right"></i> In-Active </a></li>
                        </ul>
                    </li>
                    <li><a href="{{ action('RolesController@index') }}"><i class="fa fa-circle-o"></i> Roles</a></li>--}}

                </ul>
            </li>
            <li class="treeview">
                <a href="{{ action('NavigationController@index') }}">
                    <i class="fa fa-th-list"></i>
                    <span>Site Navigation</span>
                 </a>
            </li>
            <li class="treeview">
                <a href="{{ action('SettingsController@theme') }}">
                    <i class="fa fa-adjust"></i>
                    <span>Theme</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ action('SettingsController@showSettings') }}">
                    <i class="fa fa-wrench" ></i>
                    <span>Settings</span>
                {{--    <i class="fa fa-angle-left pull-right"></i>--}}
                </a>
                {{--<ul class="treeview-menu">
                    <li><a href="{{ action('SettingsController@getInfo') }}"><i class="fa fa-circle-o"></i> New Info</a></li>
                    <li><a href="{{ action('SettingsController@showInfo') }}"><i class="fa fa-circle-o"></i> Show Information</a></li>
                </ul>--}}
            </li>
            {{--<li>
                <a href="../widgets.html">
                    <i class="fa fa-th"></i> <span>Widgets</span>
                    <small class="label pull-right bg-green">Hot</small>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pie-chart"></i>
                    <span>Charts</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                    <li><a href="../charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                    <li><a href="../charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                    <li><a href="../charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-laptop"></i>
                    <span>UI Elements</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
                    <li><a href="../UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
                    <li><a href="../UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
                    <li><a href="../UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
                    <li><a href="../UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
                    <li><a href="../UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Forms</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
                    <li><a href="../forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
                    <li><a href="../forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-table"></i> <span>Tables</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="../tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
                    <li><a href="../tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
                </ul>
            </li>
            <li>
                <a href="../calendar.html">
                    <i class="fa fa-calendar"></i> <span>Calendar</span>
                    <small class="label pull-right bg-red">3</small>
                </a>
            </li>
            <li>
                <a href="../mailbox/mailbox.html">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                    <small class="label pull-right bg-yellow">12</small>
                </a>
            </li>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-folder"></i> <span>Examples</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
                    <li><a href="profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
                    <li><a href="login.html"><i class="fa fa-circle-o"></i> Login</a></li>
                    <li><a href="register.html"><i class="fa fa-circle-o"></i> Register</a></li>
                    <li><a href="lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
                    <li><a href="404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
                    <li><a href="500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
                    <li class="active"><a href="blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
                    <li><a href="pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-share"></i> <span>Multilevel</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                    <li>
                        <a href="#"><i class="fa fa-circle-o"></i> Level One <i class="fa fa-angle-left pull-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                            <li>
                                <a href="#"><i class="fa fa-circle-o"></i> Level Two <i class="fa fa-angle-left pull-right"></i></a>
                                <ul class="treeview-menu">
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
                </ul>
            </li>
            <li><a href="../../documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
            <li class="header">LABELS</li>
            <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
            <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>--}}
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>