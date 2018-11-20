@extends('dashboard.layouts.default')

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Slides in slider</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('SliderController@create') }}" type="button" class="btn btn-box-tool"  data-toggle="tooltip" title="Add Slide">
                        <i class="fa fa-plus"></i>
                    </a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                @include('dashboard.partials.formErrorMessage')
                <table class="table table-bordered">
                    <tbody><tr>
                        <th style="width: 10px">#</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Button</th>
                        <th>Auction</th>
                    </tr>
                    @foreach($slides as $key=>$slide)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img width="80" src="{{ asset('assets/images/slider/'.$slide->background) }}" class="img-thumbnail img-responsive" alt="{{ $slide->title }}"></td>
                            <td>{{ $slide->title }}</td>
                            <td>{{ str_limit($slide->description,50) }}</td>
                            <td>
                                @if(!empty($slide->link))
                                    <a class="btn btn-xs btn-success" href="{{ $slide->link }}">{{ $slide->link_text }}</a>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ action('SliderController@edit',$slide->id) }}" class="btn btn-xs btn-warning" data-toggle="tooltip"  data-original-title="Edit"><i class="fa fa-edit"></i> </a>
                                {!! Form::open(['action'=>['SliderController@destroy',$slide->id],'method'=>'delete','style'=>'display:inline;']) !!}
                                <button type="button" class="btn btn-xs btn-danger btn-delete-slide" data-toggle="tooltip"  data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach
                    @if($slides->isEmpty())
                        <tr>
                            <td colspan="7">
                                <p class="alert alert-warning text-center">
                                    No slides found.
                                </p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box -->

        <div class="box">
            {!! Form::open(['action'=>['SettingsController@postSettings'],'method'=>'post','class'=>'form-horizontal']) !!}
            <div class="box-header with-border">
                <h3 class="box-title">Slider Settings</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                   <div class="row">
                        <div class="col-sm-6 col-sm-offset-2">
                            <div class="form-group">
                                <label for="background" class="col-sm-3 control-label">Slide Show Speed</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="slide-show-speed" value="{{ isset($SliderSettings['slide-show-speed']['value']) && trim($SliderSettings['slide-show-speed']['value'])>0?trim($SliderSettings['slide-show-speed']['value']):5000 }}">
                                    @if ($errors->has('background'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('background') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="background" class="col-sm-3 control-label">Animation Delay</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="animation-speed" value="{{ isset($SliderSettings['animation-speed']['value']) && trim($SliderSettings['animation-speed']['value'])>0?trim($SliderSettings['animation-speed']['value']):600 }}">
                                    @if ($errors->has('background'))
                                        <span class="help-block">
                                                <strong>{{ $errors->first('background') }}</strong>
                                            </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"> Animation </label>
                                <div class="col-sm-9" style="padding-top: 5px;">
                                    <label>
                                        <input type="radio"  {{ isset($SliderSettings['animation']['value']) && trim($SliderSettings['animation']['value'])=='slide'?'checked':'' }} name="animation" value="slide" class="minimal" >
                                        Slide
                                    </label>
                                    &nbsp;
                                    <label>
                                        <input type="radio" {{ isset($SliderSettings['animation']['value']) && trim($SliderSettings['animation']['value'])!='slide'?'checked':'' }} name="animation" value="fade" class="minimal" >
                                        Fade
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"> Slide Direction</label>
                                <div class="col-sm-9" style="padding-top: 5px;">
                                    <label>
                                        <input type="radio" {{ isset($SliderSettings['direction']['value']) && trim($SliderSettings['direction']['value'])=='vertical'?'checked':'' }} name="direction" value="vertical" class="minimal" >
                                        Vertical
                                    </label>
                                    &nbsp;
                                    <label>
                                        <input type="radio" {{ isset($SliderSettings['direction']['value']) && trim($SliderSettings['direction']['value'])!='vertical'?' checked="true" ':'' }} name="direction" value="horizontal" class="minimal" >
                                        Horizontal
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"> Randomize</label>
                                <div class="col-sm-9" style="padding-top: 5px;">
                                    <label>
                                        <input type="radio" {{ isset($SliderSettings['random']['value']) && $SliderSettings['random']['value']=='true'?'checked':'' }} name="random" value="true" class="minimal" >
                                        Yes
                                    </label>
                                    &nbsp;
                                    <label>
                                        <input type="radio" {{ isset($SliderSettings['random']['value']) && $SliderSettings['random']['value']!='true'  ?'checked':'' }} name="random" value="false" class="minimal" >
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"> Reverse</label>
                                <div class="col-sm-9" style="padding-top: 5px;">
                                    <label>
                                        <input type="radio" {{ isset($SliderSettings['reverse']['value']) && trim($SliderSettings['reverse']['value'])=='true'?' checked ':'' }} name="reverse" value="true" class="minimal" >
                                        Yes
                                    </label>
                                    &nbsp;
                                    <label>
                                        <input type="radio" {{ isset($SliderSettings['reverse']['value']) && trim($SliderSettings['reverse']['value'])!='true'?' checked ':'' }} name="reverse" value="false" class="minimal" >
                                        No
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-8">
                                    <span class="pull-right">
                                         <button type="submit" class="btn btn-info ">Save</button>
                                    </span>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </section>
@endsection
@section('footer')
    <script>
        $(document).on('click','.btn-delete-slide', function () {
            var form = $(this).parents('form:first');
            $.confirm({
                icon: 'fa fa-trash-o',
                title: 'Delete Slider Slide!',
                closeIcon: true,
                animation: 'rotate',
                closeAnimation: 'rotate',
                content: 'Are you want to delete this slide?',
                confirmButton: 'Yes',
                cancelButton: 'No',
                confirmButtonClass: 'btn-danger',
                cancelButtonClass: 'btn-info',
                confirm: function(){
                    form.submit();
                }
            });
        });
    </script>
@stop
