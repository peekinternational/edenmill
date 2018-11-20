@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Add New Product</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('ProductController@getIndex') }}" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Show Products">
                        <i class="fa fa-list"></i></a>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div>
            {!! Form::model($product,['action'=>['ProductController@update',$product->id],'method'=>'patch','class'=>'form-horizontal','files'=>true,'enctype'=>'multipart/form-data']) !!}
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-2">
                        <p class="col-sm-offset-3 alert alert-info">
                            <strong>Note:</strong>
                            To auto generate slug just leave empty the slug field.
                        </p>
                        @include('dashboard.partials.formErrorMessage')
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-3 control-label">Title <span>*</span></label>
                            <div class="col-sm-9">
                                {!! Form::text('name',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Product Title','required'=>true,'autofocus'=>true])  !!}
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('slug') ? ' has-error' : '' }}">
                            <label for="name" class="col-sm-3 control-label">Slug <span>*</span></label>
                            <div class="col-sm-9">
                                {!! Form::text('slug',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Slug'])  !!}
                                @if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-sm-3 control-label">Price <span>*</span></label>
                            <div class="col-sm-9">
                                {!! Form::number('price',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Price','required'=>true])  !!}
                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-9">
                                {!! Form::textarea('description',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Description'])  !!}
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('categories') ? ' has-error' : '' }}">
                            <label for="category_id" class="col-sm-3 control-label">Product Category</label>
                            <div class="col-sm-9">
                                <select name="category_id" id="category_id" class="form-control select2">
                                    @foreach($categories as $category_id=>$category_name)
                                        <option {{ $product->category_id == $category_id?' selected=""':'' }}  value="{{ $category_id }}">{{ $category_name }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tags'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('tags') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group {{ $errors->has('navs') ? ' has-error' : '' }}">
                            <label for="navs" class="col-sm-3 control-label">Product Pages <span>*</span></label>
                            <div class="col-sm-9">
                                 <select name="navs[]" id="categories" data-placeholder="Pages where product will be visible" class="form-control select2" multiple>
                                    @foreach($navs->where('slug','shop')->first()->sub_navs as $nav)
                                        <option {{ $product->navs->contains($nav)?'selected="selected"':'' }} value="{{ $nav->id }}">{{ $nav->title }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('navs'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('navs') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('tags') ? ' has-error' : '' }}">
                            <label for="tags" class="col-sm-3 control-label">Tags</label>
                            <div class="col-sm-9">
                                <select name="tags[]" id="tags" class="form-control select2" multiple>
                                    @foreach($tags as $id=>$tag)
                                        <option {{ $product->tags->contains($id)?'selected="selected"':'' }} value="{{ $id }}">{{ $tag }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('tags'))
                                    <span class="help-block">
                            <strong>{{ $errors->first('tags') }}</strong>
                        </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-9 col-sm-offset-3">
                                <hr>
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('meta_title') ? ' has-error' : '' }}">
                            <label for="meta_title" class="col-sm-3 control-label">Meta Title</label>
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
                                {!! Form::text('meta_keywords',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Meta Keywords'])  !!}
                                @if ($errors->has('meta_keywords'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('meta_keywords') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('meta_description') ? ' has-error' : '' }}">
                            <label for="meta_description" class="col-sm-3 control-label">Meta Description</label>
                            <div class="col-sm-9">
                                {!! Form::textarea('meta_description',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Meta Description'])  !!}
                                @if ($errors->has('meta_description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('meta_keywords') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('photos') ? ' has-error' : '' }}">
                            <label class="col-sm-3 control-label"> Photos</label>
                            <div class="col-sm-9">
                                <input type="file" name="photos[]" multiple class="input-photo" accept="image/*">
                            </div>
                        </div>
                        <div class="form-group {{ $errors->has('photos') ? ' has-error' : '' }}">
                            <div class="col-sm-9 col-sm-offset-3 preview-images">
                            </div>
                        </div>
                </div>
              </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <div class="row">
                    <div class="col-sm-11">
                        <span class="pull-right">
                             <button type="reset" class="btn btn-default">Cancel</button>
                             &nbsp;
                             <button type="submit" class="btn btn-info ">Update</button>
                        </span>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
                    <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
@stop
@section('footer')
    <script>
        function readURL(input) {
            if (input.files && input.files.length>0) {
                for (var i=0;i<input.files.length;i++){
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        $('.preview-images').append('<img width="200" src="'+ e.target.result +'" id="image_upload_preview" class="img-responsive img-thumbnail">')
                    };
                    reader.readAsDataURL(input.files[i]);
                }

            }
        }
        $(".input-photo").change(function () {
            $('.preview-images').html('');
            readURL(this);
        });
        $(function () {
            //Initialize Select2 Elements
            try {
                $(".select2").select2({
                    placeholder:'Select Tags'
                });
            }catch (e){
                console.error(e);
            }
            try {
                //iCheck for checkbox and radio inputs
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
                //Red color scheme for iCheck
                $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                    checkboxClass: 'icheckbox_minimal-red',
                    radioClass: 'iradio_minimal-red'
                });
            }catch (e){
                console.error(e);
            }

        });
    </script>
@stop
