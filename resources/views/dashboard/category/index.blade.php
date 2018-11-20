@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Product Categories</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('CategoryController@create') }}" type="button" class="btn btn-box-tool"  data-toggle="tooltip" title="Add Categories">
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
                    <tbody>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>created at</th>
                            <th>Auction</th>
                        </tr>
                    @foreach($categories as $key=>$category)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>
                            <td>
                               {{-- <a href="{{ action('CategoryController@show',$category->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip"  data-original-title="View Profile"><i class="fa fa-search"></i> </a>--}}
                            <span class="pull-right">
                                    <a href="{{ action('CategoryController@edit',$category->id) }}" class="btn btn-xs btn-warning" data-toggle="tooltip"  data-original-title="Edit"><i class="fa fa-edit"></i> </a>
                                    {!! Form::open(['action'=>['CategoryController@destroy',$category->id],'method'=>'delete','style'=>'display:inline;']) !!}
                                       <button type="button" class="btn btn-xs btn-danger btn-delete-category" data-toggle="tooltip"  data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                                    {!! Form::close() !!}
                            </span>

                            </td>
                        </tr>
                    @endforeach
                    @if($categories->isEmpty())
                        <tr>
                            <td colspan="7">
                                <p class="alert alert-warning text-center">
                                    No categories found.
                                </p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
@stop
@section('footer')
    <script>
        $(document).on('click','.btn-delete-category', function () {
            var form = $(this).parents('form:first');

            $.confirm({
                icon: 'fa fa-trash-o',
                title: 'Delete Category!',
                closeIcon: true,
                animation: 'rotate',
                closeAnimation: 'rotate',
                content: 'Are you want to delete this category?',
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
