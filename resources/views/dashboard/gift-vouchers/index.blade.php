@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Gift Vouchers Orders</h3>
                <div class="box-tools pull-right">
                    <a href="{{ action('GiftVouchersController@create') }}" type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-original-title="New Gift Voucher">
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
                        <th>Payer ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Voucher Type</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Tax</th>
                        <th>Total</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>IPN Track id</th>
                        <th>Payment Status</th>
                        <th>Payer Status</th>
                        <th>Payment Date</th>
                    </tr>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{ $order->payer_id }}</td>
                            <td>{{ $order->address_name }}</td>
                            <td>{{ $order->payer_email }}</td>
                            <td>{{ ucfirst(str_replace('_','-',$order->type)) }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>&euro; {{ (float)$order->price }}</td>
                            <td>&euro; {{ (float)$order->tax }}</td>
                            <td>&euro; {{ ((float)$order->price * (float)$order->quantity) + (float)$order->tax}}</td>
                            <td>{{ $order->address_street }}</td>
                            <td>{{ $order->address_city }}</td>
                            <td>{{ strtoupper($order->address_country_code) }}</td>
                            <td>{{ $order->ipn_track_id }}</td>
                            <td>
                                <label class="label label-info">Paid</label>
                            </td>
                            <td>
                                <label class="label label-info">{{$order->payer_status }}</label>
                            </td>
                            <td>{{ $order->payment_date }}</td>
                        </tr>
                    @endforeach
                    @if($orders->isEmpty())
                        <tr>
                            <td colspan="13">
                                <p class="alert alert-warning text-center">
                                    No gift vouchers orders found.
                                </p>
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
               {{ $orders->links() }}
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
                title: 'Delete User!',
                closeIcon: true,
                animation: 'rotate',
                closeAnimation: 'rotate',
                content: 'Are you want to delete this user?',
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
