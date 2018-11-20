@inject('cart', 'LukePOLO\LaraCart\LaraCart')
<?php $cart_items = 0; ?>
@foreach($cart->getItems() as $item)
    <?php $cart_items++; ?>
@endforeach
@extends('master')
@section('breadcrumb')
    @include('partials.breadcrumb')
@stop
@section('content')
    <div class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} section_padding_top_135 section_padding_bottom_100">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <h2 class="page-404__sub-title">Thank you for using our site.</h2>
                    <p>
                        Thank you for buying. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate doloribus eligendi enim et eveniet expedita facilis illum iusto numquam, officia provident, quas repellat, sit. Consequatur, nemo vitae? Ea laborum, obcaecati?
                    </p>
                    <a href="{{ url('/') }}" class="page-404__button inverse wide_button">Go Home</a>
                </div>
            </div>
        </div>
    </div>
@stop
@section('scripts')
        <script>
            $(document).ready(function () {
                $('.cart-table').on('change','input', function () {
                   // alert();
                    //$(this).parents('.product-quantity').siblings('.product-subtotal').find('.amount').html('43');
                });

                $('.btn-update-cart').click(function () {
                    var products = {};
                    var index = 0;
                    $('.input-product-quantity').each(function () {
                        products[index] = {
                            id: $(this).attr('data-id'),
                            quantity:$(this).val()
                        };
                        index++;
                    });
                    $.ajax({
                        url:'{{ url('cart/update/all') }}',
                        type:'post',
                        dataType:'json',
                        data:{
                            _token: "{{ csrf_token() }}",
                            products : products
                        },
                        success: function (result) {
                            console.log(result.notify);
                            if(result.notify!=null){
                                $.notify(result.notify, result.type);
                                setTimeout(function () {
                                    location.reload();
                                },1000);
                            }
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                });
            });
        </script>
@stop