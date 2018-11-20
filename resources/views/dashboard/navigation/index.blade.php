@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Site Navigation</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('NavigationController@create') }}" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="New Navigation">
                        <i class="fa fa-plus"></i></a>
                     <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="tree">
                    <ul>
                        @foreach($navs as $key=>$nav)
                            <li class="{{ !($nav->sub_navs->count()>0) ? '':'parent_li' }}">
                                <span>
                                    @if(!($nav->sub_navs->count()>0))
                                        <?php
                                        $url = '#';
                                        if($nav->slug == 'about'){
                                            $url = url('/').'#about-us';
                                        }elseif($nav->slug == 'home'){
                                            $url = url('/');
                                        }elseif($nav->slug == 'blog'){
                                            $url = url('/blog');
                                        }elseif($nav->slug =='shop'){
                                            $url = url('/').'#shop';
                                        }elseif($nav->page_id>0 && isset($nav->page->slug) && !empty($nav->page->slug)){
                                            $url = url($nav->page->slug.'/page');
                                        }
                                        if(!empty($nav->url) && filter_var($nav->url,FILTER_VALIDATE_URL) == true){
                                            $url = $nav->url;
                                        }
                                        ?>
                                        <a href="{{ $url }}"><i class="fa fa-link"></i> {{ $nav->title }}</a>
                                    @else
                                        <i class="fa {{ !($nav->sub_navs->count()>0) ? 'fa-link':'fa-folder-open' }}"></i> {{ $nav->title }}
                                    @endif

                                    <span class="action" style="margin-left: 20px">
                                         <a href="{{ action('NavigationController@edit',['id'=>$nav->id]) }}"><i class="fa fa-edit"></i></a>
                                        @if(!in_array($nav->slug,['blog','home','shop','about-us']))
                                            {!! Form::open(['action'=>['NavigationController@destroy',$nav->id],'method'=>'delete','style'=>'display:inline']) !!}
                                                <a href="#" class="btn-delete-main-menu"><i class="fa fa-trash-o"></i></a>
                                            {!! Form::close() !!}
                                         @endif
                                    </span>
                                </span>
                                @if($nav->sub_navs->count()>0)
                                    <ul>
                                        @foreach($nav->sub_navs as $sub_nav)
                                            <li>
                                                <span>
                                                    <a href="#"> <i class="fa fa-link"></i> {{ $sub_nav->title }}</a>
                                                    <span class="action" style="margin-left: 20px">
                                                        <a href="{{ action('NavigationController@edit_subNav',['id'=>$sub_nav->id]) }}"><i class="fa fa-edit"></i></a> &nbsp;
                                                        {!! Form::open(['action'=>['NavigationController@destroy_subNav',$sub_nav->id],'method'=>'delete','style'=>'display:inline']) !!}
                                                             <a href="#" class="btn-delete-sub-menu"><i class="fa fa-trash-o"></i></a>
                                                        {!! Form::close() !!}
                                                    </span>
                                                </span>

                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </li>
                        @endforeach
                        {{--<li>
                            <span><i class="icon-folder-open"></i> Parent</span> <a href="">Goes somewhere</a>
                            <ul>
                                <li>
                                    <span><i class="icon-minus-sign"></i> Child</span> <a href="">Goes somewhere</a>
                                    <ul>
                                        <li>
                                            <span><i class="icon-leaf"></i> Grand Child</span> <a href="">Goes somewhere</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span><i class="icon-minus-sign"></i> Child</span> <a href="">Goes somewhere</a>
                                    <ul>
                                        <li>
                                            <span><i class="icon-leaf"></i> Grand Child</span> <a href="">Goes somewhere</a>
                                        </li>
                                        <li>
                                            <span><i class="icon-minus-sign"></i> Grand Child</span> <a href="">Goes somewhere</a>
                                            <ul>
                                                <li>
                                                    <span><i class="icon-minus-sign"></i> Great Grand Child</span> <a href="">Goes somewhere</a>
                                                    <ul>
                                                        <li>
                                                            <span><i class="icon-leaf"></i> Great great Grand Child</span> <a href="">Goes somewhere</a>
                                                        </li>
                                                        <li>
                                                            <span><i class="icon-leaf"></i> Great great Grand Child</span> <a href="">Goes somewhere</a>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <span><i class="icon-leaf"></i> Great Grand Child</span> <a href="">Goes somewhere</a>
                                                </li>
                                                <li>
                                                    <span><i class="icon-leaf"></i> Great Grand Child</span> <a href="">Goes somewhere</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <span><i class="icon-leaf"></i> Grand Child</span> <a href="">Goes somewhere</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>--}}

                    </ul>
                </div>

                {{--<div class="tree">
                    <ul>
                        <li>
                            <span><i class="icon-calendar"></i> 2013, Week 2</span>
                            <ul>
                                <li>
                                    <span class="badge badge-success"><i class="icon-minus-sign"></i> Monday, January 7: 8.00 hours</span>
                                    <ul>
                                        <li>
                                            <a href=""><span><i class="icon-time"></i> 8.00</span> &ndash; Changed CSS to accomodate...</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="badge badge-success"><i class="icon-minus-sign"></i> Tuesday, January 8: 8.00 hours</span>
                                    <ul>
                                        <li>
                                            <span><i class="icon-time"></i> 6.00</span> &ndash; <a href="">Altered code...</a>
                                        </li>
                                        <li>
                                            <span><i class="icon-time"></i> 2.00</span> &ndash; <a href="">Simplified our approach to...</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="badge badge-warning"><i class="icon-minus-sign"></i> Wednesday, January 9: 6.00 hours</span>
                                    <ul>
                                        <li>
                                            <a href=""><span><i class="icon-time"></i> 3.00</span> &ndash; Fixed bug caused by...</a>
                                        </li>
                                        <li>
                                            <a href=""><span><i class="icon-time"></i> 3.00</span> &ndash; Comitting latest code to Git...</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <span class="badge badge-important"><i class="icon-minus-sign"></i> Wednesday, January 9: 4.00 hours</span>
                                    <ul>
                                        <li>
                                            <a href=""><span><i class="icon-time"></i> 2.00</span> &ndash; Create component that...</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <span><i class="icon-calendar"></i> 2013, Week 3</span>
                            <ul>
                                <li>
                                    <span class="badge badge-success"><i class="icon-minus-sign"></i> Monday, January 14: 8.00 hours</span>
                                    <ul>
                                        <li>
                                            <span><i class="icon-time"></i> 7.75</span> &ndash; <a href="">Writing documentation...</a>
                                        </li>
                                        <li>
                                            <span><i class="icon-time"></i> 0.25</span> &ndash; <a href="">Reverting code back to...</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>--}}
            </div>
        </div>
        <!-- /.box -->
    </section>
@stop
@section('footer')
    <script>
        $(document).on('click','.btn-delete-sub-menu', function () {
            var form = $(this).parents('form:first');
            $.confirm({
                icon: 'fa fa-trash-o',
                title: 'Delete Sub Navigation!',
                closeIcon: true,
                animation: 'rotate',
                closeAnimation: 'rotate',
                content: 'Are you want to delete this sub navigation?',
                confirmButton: 'Yes',
                cancelButton: 'No',
                confirmButtonClass: 'btn-danger',
                cancelButtonClass: 'btn-info',
                confirm: function(){
                    form.submit();
                }
            });
        });
        $(document).on('click','.btn-delete-main-menu', function () {
            var form = $(this).parents('form:first');
            $.confirm({
                icon: 'fa fa-trash-o',
                title: 'Delete Navigation!',
                closeIcon: true,
                animation: 'rotate',
                closeAnimation: 'rotate',
                content: 'Are you want to delete this navigation?',
                confirmButton: 'Yes',
                cancelButton: 'No',
                confirmButtonClass: 'btn-danger',
                cancelButtonClass: 'btn-info',
                confirm: function(){
                    form.submit();
                }
            });
        });
        $(function () {
            $('.tree li:has(ul)').addClass('parent_li').find(' > span').attr('title', 'Collapse this branch');
            $('.tree li.parent_li > span').on('click', function (e) {
                var children = $(this).parent('li.parent_li').find(' > ul > li');
                if (children.is(":visible")) {
                    children.hide('fast');
                    $(this).attr('title', 'Expand this branch').find(' > i').addClass('icon-plus-sign').removeClass('icon-minus-sign');
                } else {
                    children.show('fast');
                    $(this).attr('title', 'Collapse this branch').find(' > i').addClass('icon-minus-sign').removeClass('icon-plus-sign');
                }
                e.stopPropagation();
            });
        });
    </script>
@stop
@section('css')
    <style>
        .tree {
            min-height:20px;
            padding:19px;
            margin-bottom:20px;
            background-color:#fbfbfb;
            border:1px solid #999;
            -webkit-border-radius:4px;
            -moz-border-radius:4px;
            border-radius:4px;
            -webkit-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
            -moz-box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05);
            box-shadow:inset 0 1px 1px rgba(0, 0, 0, 0.05)
        }
        .tree li {
            list-style-type:none;
            margin:0;
            padding:10px 5px 0 5px;
            position:relative
        }
        .tree li::before, .tree li::after {
            content:'';
            left:-20px;
            position:absolute;
            right:auto
        }
        .tree li::before {
            border-left:1px solid #999;
            bottom:50px;
            height:100%;
            top:0;
            width:1px
        }
        .tree li span.action a{
            visibility: hidden;
        }
        .tree li:hover span.action a{
            visibility: visible;
        }
        .tree li::after {
            border-top:1px solid #999;
            height:20px;
            top:25px;
            width:25px
        }
        .tree li span:not(.action) {
            -moz-border-radius:5px;
            -webkit-border-radius:5px;
            border:1px solid #999;
            border-radius:5px;
            display:inline-block;
            padding:3px 8px;
            text-decoration:none
        }
        .tree li.parent_li>span {
            cursor:pointer
        }
        .tree>ul>li::before, .tree>ul>li::after {
            border:0
        }
        .tree li:last-child::before {
            height:30px
        }
        .tree li.parent_li>span:hover, .tree li.parent_li>span:hover+ul li span {
            background:#eee;
            border:1px solid #94a0b4;
            color:#000
        }
    </style>
@stop
