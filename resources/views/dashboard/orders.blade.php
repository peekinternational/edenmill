@extends('dashboard.layouts.default')
@section('content')
    <section class="content">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Orders</h3>
                <div class="box-tools pull-right">
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
                        <th>Cart Items</th>
                        <th>Total Price</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Country</th>
                        <th>IPN Track id</th>
                        <th>Payment Status</th>
                        <th>Payer Status</th>
                        <th>Payment Date</th>
                    </tr>
                    @foreach($orders as $order)
                    <?php 
                        //$products =  $order->products($order->id)->get();
                        $order_products = $order->order_products()->select('order_products.*','products.name',DB::raw('((order_products.quantity * order_products.price) + IFNULL(order_products.tax, 0)) as total'),DB::raw('((order_products.quantity * order_products.price) + IFNULL(order_products.tax, 0)) as total'))->join('products', 'products.id', '=', 'order_products.product_id')->get();
                     ?>
                        <tr>
                            <td>{{ $order->payer_id }}</td>
                            <td>{{ $order->address_name }}</td>
                            <td>
                            {{ $order->num_cart_items }} 
                            <span data-toggle="tooltip" title="Show details"></span>
                            <button type="button" data-toggle="modal" data-target="#modal-id-{{ $order->id }}"  class="btn btn-xs btn-primary pull-right"><i class="fa fa-eye"></i></button>
                            
                            <div class="modal fade" id="modal-id-{{ $order->id }}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title">Order Details</h4>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Quantity</th>
                                                    <th>Price</th>
                                                    <th>Tax</th>
                                                    <th>SubTotal</th>
                                                </tr>
                                                @foreach($order_products as $_product)
                                                    <tr>
                                                        <td>
                                                        {{ $_product->name }}
                                                        </th>
                                                        <td>{{ $_product->quantity }}</th>
                                                        <td>&euro; {{ $_product->price }}</th>
                                                        <td>&euro; {{ (float)$_product->tax }}</th>
                                                        <td>&euro; {{ ($_product->quantity * $_product->price) + (float)$_product->tax }}</th>
                                                    </tr>
                                                    @endforeach
                                                     <tr>
                                                        <th colspan="4">Total</th>
                                                        <td>&euro; {{ $order_products->sum('total') }}</td>
                                                    </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </td>
                            <td>&euro; {{ $order_products->sum('total') }}</td>
                            <td>{{ $order->payer_email }}</td>
                            <td>{{ $order->address_street }}</td>
                            <td>{{ $order->address_city }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->ipn_track_id }}</td>
                            <td>
                                <label class="label label-success">Paid</label>
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
                                    No orders found.
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
      
    </script>
@stop
