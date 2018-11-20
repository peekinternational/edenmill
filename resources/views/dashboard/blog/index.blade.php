@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <input type="text" placeholder="Search a post.." class="form-control">
                        <hr>
                    </div>
                    <div class="col-sm-12">
                        <div class="tab-pane active" id="timeline"  >
                            <!-- The timeline -->
                            <ul class="timeline timeline-inverse">
                                <!-- timeline time label -->
                                <?php
                                    $post_dates = [];
                                ?>
                                @foreach($posts as $post)
                                @if(!in_array($post->publish_at->format('d / M / Y'),$post_dates))
                                        <?php array_push($post_dates,$post->publish_at->format('d / M / Y')) ?>
                                            <li class="time-label">
                                                <span class="bg-red">
                                                  {{ $post->publish_at->format('d / M / Y') }}
                                                </span>
                                            </li>
                                 @endif
                                <li>
                                    <i class="fa  fa-rss bg-blue"></i>
                                    <div class="timeline-item" >
                                        <span class="time"><i class="fa fa-clock-o"></i> {{ $post->publish_at->format('h:n') }}</span>
                                        <h3 class="timeline-header"><a href="#">{{ $post->user->first_name }} {{ $post->user->last_name }}</a> posted a new blog post</h3>
                                        <div class="timeline-body" style="overflow: hidden !important;">
                                            <h3>{{ $post->title }}</h3>
                                            <div>
                                                    {!! html_entity_decode($post->post) !!}
                                            </div>
                                        </div>
                                        <div class="timeline-footer">
                                            <a href="{{ action('BlogController@showPost',$post->id) }}" class="btn btn-primary btn-xs">Goto post</a>
                                            <span class="pull-right">
                                                <a href="{{ action('BlogController@edit',$post->id) }}" class="btn btn-warning btn-xs">Edit</a>
                                                <a class="btn btn-danger btn-xs">Delete</a>
                                            </span>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                                <!-- END timeline item -->
                                <li>
                                    <i class="fa fa-clock-o bg-gray"></i>
                                </li>
                            </ul>
                        </div>


                    </div>
                </div>
            </div>
            <div class="box-footer clearfix">
                {{ $posts->links() }}
            </div>
        </div>
        <!-- /.box -->
    </section>
@stop