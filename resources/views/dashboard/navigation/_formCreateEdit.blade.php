<div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
    <label for="name" class="col-sm-3 control-label">Title <span>*</span></label>
    <div class="col-sm-9">
        {!! Form::text('title',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Navigation title','required'=>true,'autofocus'=>true])  !!}
        @if ($errors->has('title'))
            <span class="help-block">
                <strong>{{ $errors->first('title') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
    <label for="last_name" class="col-sm-3 control-label">Slug</label>
    <div class="col-sm-9">
        <?php
            $attributes = [
                    'class'=>'form-control',
                    'placeholder'=>'Slug',
                    'data-enable'=>true
            ];
            if(isset($nav_info->slug) && !empty($nav_info->slug)){
                    switch(trim($nav_info->slug)){
                        case 'shop':
                        case 'gift-vouchers':
                        case 'home':
                        case 'blog':
                        $attributes = [
                                'class'=>'form-control',
                                'placeholder'=>'Slug',
                                'disabled'=>true
                        ];
                                    break;
                    }
            }
        ?>
        {!! Form::text('slug',$value= null, $attributes)  !!}
        @if ($errors->has('slug'))
            <span class="help-block">
                <strong>{{ $errors->first('slug') }}</strong>
            </span>
        @endif
    </div>
</div>
<div class="form-group {{ $errors->has('order_by') ? ' has-error' : '' }}">
    <label for="order_by" class="col-sm-3 control-label">Sorting Position</label>
    <div class="col-sm-9">
        {!! Form::number('order_by',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Sorting Position'])  !!}
        @if ($errors->has('order_by'))
            <span class="help-block">
                <strong>{{ $errors->first('order_by') }}</strong>
            </span>
        @endif
    </div>
</div>
<div {!! isset($nav_info->type) && $nav_info->type == 'sub-menu'?'style="display: none"':''   !!}  class="form-group hidden-sub-menu {{ $errors->has('color') ? ' has-error' : '' }}">
    <label for="color" class="col-sm-3 control-label">Color </label>
    <div class="col-sm-9">
        {!! Form::color('color',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Color'])  !!}
        @if ($errors->has('color'))
            <span class="help-block">
                <strong>{{ $errors->first('color') }}</strong>
            </span>
        @endif
    </div>
</div>