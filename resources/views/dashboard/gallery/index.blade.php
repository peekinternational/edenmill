@extends('dashboard.layouts.default')

@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Gallery</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('GalleryController@create') }}" type="button" class="btn btn-box-tool"  data-toggle="tooltip" title="Add Item to gallery">
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
                        <th>Downloadable</th>
                        <th>Auction</th>
                    </tr>
                    @if(!$gallery->isEmpty())
                    @foreach($gallery as $key=>$gallery_item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td><img width="80" src="{{ asset('assets/images/gallery/'.$gallery_item->image) }}" class="img-thumbnail img-responsive" alt="{{ $gallery_item->title }}"></td>
                            <td>{{ $gallery_item->title }}</td>
                            <td>{{ str_limit($gallery_item->description,50) }}</td>
                            <td>
                                <span class="label {{ ($gallery_item->downloadable?'label-success':'label-danger') }}">{{ ($gallery_item->downloadable?'Yes':'No') }}</span>
                            </td>
                            <td class="text-center">
                                <a href="{{ action('GalleryController@edit',$gallery_item->id) }}" class="btn btn-xs btn-warning" data-toggle="tooltip"  data-original-title="Edit"><i class="fa fa-edit"></i> </a>
                                {!! Form::open(['action'=>['GalleryController@destroy',$gallery_item->id],'method'=>'delete','style'=>'display:inline;']) !!}
                                <button type="button" class="btn btn-xs btn-danger btn-delete-slide" data-toggle="tooltip"  data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach
                    @endif
                    @if($gallery->isEmpty())
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
        <div class="box">
            {!! Form::open(['action'=>['GalleryController@updateCategories'],'method'=>'post','class'=>'form-horizontal']) !!}
            <div class="box-header with-border">
                <h3 class="box-title">Gallery Categories</h3>
                <div class="box-tools pull-right">
                    <button  type="button" class="btn btn-box-tool btn-gallery-categories"  data-toggle="tooltip" title="Add New Category">
                        <i class="fa fa-plus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>#</td>
                                    <td>Category</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody class="gallery-categories">
                            @if(isset($GalleryCategory) && $GalleryCategory!=false && !$GalleryCategory->isEmpty())
                                @foreach($GalleryCategory as $key=>$category)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>
                                            <input type="hidden" name="id-{{$category['id']}}" value="{{$category['id']}}">
                                            <input type="text" name="name-{{$category['id'] }}" value="{{ $category['value'] }}" class="form-control">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-xs btn-danger btn-delete-gallery-category" data-toggle="tooltip"  data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td>#</td>
                                    <td>
                                        <input type="text" name="category[]" class="form-control">
                                    </td>
                                    <td>

                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
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
        $('.btn-gallery-categories').click(function () {
            $('table tbody.gallery-categories').append('<tr>' +
                    '<td></td>' +
                    '<td>' +
                        '<input type="text" name="category[]" class="form-control">' +
                    '</td>' +
                    '<td>' +
                    '</td>' +
            '</tr>');
        });
        $(document).on('click','.btn-delete-slide', function () {
            var form = $(this).parents('form:first');
            $.confirm({
                icon: 'fa fa-trash-o',
                title: 'Delete Gallery Item!',
                closeIcon: true,
                animation: 'rotate',
                closeAnimation: 'rotate',
                content: 'Are you want to delete this Image?',
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
