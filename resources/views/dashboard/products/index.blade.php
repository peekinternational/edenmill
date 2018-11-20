@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Products</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('ProductController@create') }}" type="button" class="btn btn-box-tool"  data-toggle="tooltip" title="New Product">
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
                        <th>Name</th>
                        <th>Price</th>
                        <th>Details</th>
                        <th>Auction</th>
                    </tr>
                    @foreach($products as $key=>$product)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ strip_tags($product->description) }}</td>

                            <td>
                                <a href="{{ action('ProductController@show',$product->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip"  data-original-title="View Product"><i class="fa fa-search"></i> </a>
                            <span class="pull-right">
                                    <a href="{{ action('ProductController@edit',$product->id) }}" class="btn btn-xs btn-warning" data-toggle="tooltip"  data-original-title="Edit"><i class="fa fa-edit"></i> </a>
                                    {!! Form::open(['action'=>['ProductController@destroy',$product->id],'method'=>'delete','style'=>'display:inline;']) !!}
                                        <input type="hidden" class="delete_permanent" name="delete_permanent" value="0">
                                    <button type="button" class="btn btn-xs btn-danger btn-delete-user" data-toggle="tooltip"  data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                                    {!! Form::close() !!}
                            </span>

                            </td>
                        </tr>
                    @endforeach
                    @if($products->isEmpty())
                        <tr>
                            <td colspan="7">
                                <p class="alert alert-warning text-center">
                                    Products not found.
                                </p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                {{ $products->links() }}
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
@stop
@section('footer')
    <script>
        $(document).on('click','.btn-delete-user', function () {
            var form = $(this).parents('form:first');

            $.confirm({
                icon: 'fa fa-trash-o',
                title: 'Delete Product!',
                closeIcon: true,
                animation: 'rotate',
                closeAnimation: 'rotate',
                content: 'Are you want to delete this product?',
                confirmButton: 'Yes',
                cancelButton: 'No',
                confirmButtonClass: 'btn-danger',
                cancelButtonClass: 'btn-info',
                confirm: function(){
                    if(!$('input#__delete_permanent').is(':checked')){
                        form.find('input.delete_permanent').attr('value','1');
                    }
                    form.submit();
                }
            });
        });
    </script>
@stop
