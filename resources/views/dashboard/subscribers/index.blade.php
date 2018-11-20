@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Subscirbers</h3>
                <div class="box-tools pull-right">
                <a href="{{ action('SubscriberController@create') }}"><i class="fa fa-plus"></i></a>
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
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Auction</th>
                    </tr>
                    @foreach($subscribers as $key=>$subscriber)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $subscriber->name }}</td>
                            <td>{{ $subscriber->email }}</td>
                            <td>{{ $subscriber->phone }}</td>
                           
                            <td>
                             <span class="pull-right">
                                    <a href="{{ action('SubscriberController@edit',$subscriber->id) }}" class="btn btn-xs btn-warning" data-toggle="tooltip"  data-original-title="Edit"><i class="fa fa-edit"></i> </a>
                                    {!! Form::open(['action'=>['SubscriberController@destroy',$subscriber->id],'method'=>'delete','style'=>'display:inline;']) !!}
                                    <button type="button" class="btn btn-xs btn-danger btn-delete-user" data-toggle="tooltip"  data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
                                    {!! Form::close() !!}
                            </span>

                            </td>
                        </tr>
                    @endforeach
                    @if($subscribers->isEmpty())
                        <tr>
                            <td colspan="7">
                                <p class="alert alert-warning text-center">
                                    No active subscribers found.
                                </p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                {{ $subscribers->links() }}
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
                title: 'Delete Subscriber!',
                closeIcon: true,
                animation: 'rotate',
                closeAnimation: 'rotate',
                content: 'Are you want to delete this Subscriber?',
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
