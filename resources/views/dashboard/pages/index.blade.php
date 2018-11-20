@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Site Pages</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('PagesController@create') }}" type="button" class="btn btn-box-tool"  data-toggle="tooltip" title="New Page">
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
                        <th>Slug</th>
                        <th>Data</th>
                        <th>Auction</th>
                    </tr>
                    @foreach($pages as $key=>$page)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $page->name }}</td>
                            <td>{{ $page->slug }}</td>
                            <td>{{ str_limit(strip_tags(html_entity_decode($page->data,80))) }}</td>
                            <td>
                                <a href="{{ action('PagesController@show_page',$page->slug) }}" class="btn btn-xs btn-info" data-toggle="tooltip"  data-original-title="View Page"><i class="fa fa-search"></i> </a>
                                <a href="{{ action('PagesController@edit',$page->id) }}" class="btn btn-xs btn-warning" data-toggle="tooltip"  data-original-title="Edit"><i class="fa fa-edit"></i> </a>
                                {!! Form::open(['action'=>['PagesController@destroy',$page->id],'method'=>'delete','style'=>'display:inline;']) !!}
                                <button type="button" class="btn btn-xs btn-danger btn-delete-page" data-toggle="tooltip"  data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @endforeach
                    @if($pages->isEmpty())
                        <tr>
                            <td colspan="7">
                                <p class="alert alert-warning text-center">
                                    No pages found found.
                                </p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                {{ $pages->links() }}
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->
    </section>
@stop
@section('footer')
    <script>
        $(document).on('click','.btn-delete-page', function () {
            var form = $(this).parents('form:first');

            $.confirm({
                icon: 'fa fa-trash-o',
                title: 'Delete Page!',
                closeIcon: true,
                animation: 'rotate',
                closeAnimation: 'rotate',
                content: 'Are you want to delete this page?',
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
