@include('dashboard.partials.formErrorMessage')
<div class="form-group {{ $errors->has('post') ? ' has-error' : '' }}">
    <label for="post" class="col-sm-2 control-label">Post</label>
    <div class="col-sm-10">
        {!! Form::textarea('post',$value= null, $attributes = ['class'=>'form-control ckeditor','placeholder'=>'Post'])  !!}
        @if ($errors->has('post'))
            <span class="help-block">
                <strong>{{ $errors->first('post') }}</strong>
            </span>
        @endif
    </div>

</div>

<div class="form-group {{ $errors->has('publish_at') ? ' has-error' : '' }}">
    <label for="publish_at" class="col-sm-2 control-label">Publish At</label>
    <div class="col-sm-10">
        {!! Form::date('publish_at',$value= (isset($post->publish_at)?Carbon\Carbon::parse($post->publish_at)->format('Y-m-d H:i:s'):Carbon\Carbon::parse()->format('Y-m-d H:i:s')), $attributes = ['class'=>'form-control','id'=>'publish_at','placeholder'=>'Publish At'])  !!}
        @if ($errors->has('publish_at'))
            <span class="help-block">
                <strong>{{ $errors->first('publish_at') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('meta_title') ? ' has-error' : '' }}">
    <label for="meta_title" class="col-sm-2 control-label">Meta Title</label>
    <div class="col-sm-10">
        {!! Form::text('meta_title',$value= null, $attributes = ['class'=>'form-control','id'=>'meta_title','placeholder'=>'Meta Title'])  !!}
        @if ($errors->has('meta_title'))
            <span class="help-block">
                <strong>{{ $errors->first('meta_title') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
    <label for="meta_keywords" class="col-sm-2 control-label">Meta Keywords</label>
    <div class="col-sm-10">
        {!! Form::text('meta_keywords',$value= null, $attributes = ['class'=>'form-control','id'=>'meta_keywords','placeholder'=>'Meta Keywords'])  !!}
        @if ($errors->has('meta_keywords'))
            <span class="help-block">
                <strong>{{ $errors->first('meta_keywords') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
    <label for="meta_description" class="col-sm-2 control-label">Meta Description</label>
    <div class="col-sm-10">
        {!! Form::textarea('meta_description',$value=null, $attributes = ['class'=>'form-control','id'=>'meta_description','placeholder'=>'Meta Description'])  !!}
        @if ($errors->has('meta_description'))
            <span class="help-block">
                <strong>{{ $errors->first('meta_description') }}</strong>
            </span>
        @endif
    </div>
</div>