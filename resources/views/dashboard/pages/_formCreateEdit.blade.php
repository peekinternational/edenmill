@include('dashboard.partials.formErrorMessage')
<div class="row">
    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
            <label for="name" class="col-sm-3 control-label">Page Name <span>*</span></label>
            <div class="col-sm-9">
                {!! Form::text('name',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Page Name','required'=>true,'autofocus'=>true])  !!}
                @if ($errors->has('name'))
                    <span class="help-block">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
            <label for="slug" class="col-sm-3 control-label">Slug</label>
            <div class="col-sm-9">
                {!! Form::text('slug',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Slug'])  !!}
                @if ($errors->has('slug'))
                    <span class="help-block">
                <strong>{{ $errors->first('slug') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('meta_title') ? ' has-error' : '' }}">
            <label for="meta_title" class="col-sm-3 control-label">Meta title</label>
            <div class="col-sm-9">
                {!! Form::text('meta_title',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Meta Title'])  !!}
                @if ($errors->has('meta_title'))
                    <span class="help-block">
                <strong>{{ $errors->first('meta_title') }}</strong>
            </span>
                @endif
            </div>
        </div>
        <div class="form-group {{ $errors->has('meta_keywords') ? ' has-error' : '' }}">
            <label for="meta_keywords" class="col-sm-3 control-label">Meta Keywords</label>
            <div class="col-sm-9">
                {!! Form::text('meta_keywords',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Keywords'])  !!}
                @if ($errors->has('meta_keywords'))
                    <span class="help-block">
                <strong>{{ $errors->first('meta_keywords') }}</strong>
            </span>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
            <label for="meta_description" class="col-sm-12">Meta Description</label>
            <div class="col-sm-12">
                {!! Form::textarea('meta_description',$value= null, $attributes = ['class'=>'form-control','rows'=>'6','placeholder'=>'Meta Description'])  !!}
                @if ($errors->has('meta_description'))
                    <span class="help-block">
                <strong>{{ $errors->first('meta_description') }}</strong>
            </span>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('data') ? ' has-error' : '' }}">
    <label style=" width: 12.5%;" for="data" class="col-sm-2 control-label">Page Data</label>
    <div style=" width: 87.5%;" class="col-sm-11">
        {!! Form::textarea('data',$value= null, $attributes = ['class'=>'form-control ckeditor','placeholder'=>'Page Data'])  !!}
        @if ($errors->has('data'))
            <span class="help-block">
                <strong>{{ $errors->first('data') }}</strong>
            </span>
        @endif
    </div>

</div>



