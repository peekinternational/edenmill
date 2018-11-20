
<div class="col-sm-6 col-sm-offset-2">
    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
        <label for="name" class="col-sm-3 control-label">Category Name <span>*</span></label>
        <div class="col-sm-9">
            {!! Form::text('name',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Category Name','required'=>true])  !!}
            @if ($errors->has('name'))
                <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-6 col-sm-offset-2">
    <div class="form-group {{ $errors->has('meta_title') ? ' has-error' : '' }}">
        <label for="meta_title" class="col-sm-3 control-label">Meta Title</label>
        <div class="col-sm-9">
            {!! Form::text('meta_title',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Meta title'])  !!}
            @if ($errors->has('meta_title'))
                <span class="help-block">
                                        <strong>{{ $errors->first('meta_title') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-6 col-sm-offset-2">
    <div class="form-group {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
        <label for="meta_keywords" class="col-sm-3 control-label">Meta Keywords</label>
        <div class="col-sm-9">
            {!! Form::text('meta_keywords',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Meta Keywords'])  !!}
            @if ($errors->has('meta_keywords'))
                <span class="help-block">
                                        <strong>{{ $errors->first('meta_keywords') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
</div>
<div class="col-sm-6 col-sm-offset-2">
    <div class="form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
        <label for="meta_keywords" class="col-sm-3 control-label">Meta Description</label>
        <div class="col-sm-9">
            {!! Form::textarea('meta_description',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Meta Description'])  !!}
            @if ($errors->has('meta_description'))
                <span class="help-block">
                                        <strong>{{ $errors->first('meta_description') }}</strong>
                                    </span>
            @endif
        </div>
    </div>
</div>