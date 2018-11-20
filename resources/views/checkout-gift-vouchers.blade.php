@extends('master')
@section('breadcrumb')
    @include('partials.breadcrumb')
@stop
@section('content')
    <div class="{{ isset($theme['theme']['value'])?$theme['theme']['value']:'ls' }} section_padding_top_100 section_padding_bottom_75 columns_padding_25">
        <div class="container">
            <div class="row">
                <form target="paypal" class="form-horizontal checkout shop-checkout" action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                <div class="col-sm-7 col-md-8 col-lg-8">
                    <input type="hidden" name="cmd" value="_cart">
                        <input type="hidden" name="upload" value="1">
                        <input type="hidden" name="business" value="{{ (isset($PaymentSettings['active_mood']['value']) && !empty($PaymentSettings['active_mood']['value']) && isset($PaymentSettings[$PaymentSettings['active_mood']['value']]['value'])?$PaymentSettings[$PaymentSettings['active_mood']['value']]['value']:'peek.saad-facilitator@gmail.com') }}">
                        <input type="hidden" name="METHOD" value="SetExpressCheckout">
                        <input type="hidden" name="notify_url" value="{{ url('/gift/pay') }}?price={{ $_GET['price'] }}&type={{ $_GET['type'] }}&quantity={{$_GET['quantity']}}&_token={{ md5(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ').time()) }}">
                        <input type="hidden" name="currency_code" value="EUR">

                    <input name="quantity_1" value="{{ $_GET['quantity'] }}" type="hidden">
                    <input name="item_name_1" value="Gift Voucher" type="hidden">
                    <input name="item_number_1" value="GV-{{ strtoupper($_GET['type']) }}" type="hidden">
                    <input name="amount_1" value="{{ $_GET['price'] }}" type="hidden">

                    <h2 class="shop-checkout__title">Billing Address</h2>
                       <div class="form-group">
                            <label for="country" class="col-sm-3 control-label">
                                <span class="grey">Country </span>
                                <span class="required">*</span>
                            </label>
                            <div class="col-sm-9">
                                <input type="hidden" name="return" value="{{ url('/thanks') }}">
                                <input type="hidden" name="RETURNURL" value="{{ url('/thanks') }}">
                                <select class="form-control" name="country" id="country">
                                    @foreach($countries as $id=>$country)
                                        <option {{ $id=="GB"?'selected="selected"':'' }} value="{{ $id }}">{{ $country }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                           <div class="form-group validate-required  {{ $errors->has('first_name') ? ' has-error' : '' }}" id="billing_first_name_field">
                               <label for="first_name" class="col-sm-3 control-label">
                                   <span class="grey">First Name </span>
                                   <span class="required">*</span>
                               </label>
                               <div class="col-sm-9">
                                   {!! Form::text('first_name',$value= null, $attributes = ['class'=>'form-control','required'=>'required','id'=>'first_name','placeholder'=>'First Name'])  !!}
                                   @if ($errors->has('first_name'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('first_name') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                           <div class="form-group validate-required  {{ $errors->has('last_name') ? ' has-error' : '' }}" id="billing_last_name_field">
                               <label for="last_name" class="col-sm-3 control-label">
                                   <span class="grey">Last Name </span>
                                   <span class="required">*</span>
                               </label>
                               <div class="col-sm-9">
                                   {!! Form::text('last_name',$value= null, $attributes = ['class'=>'form-control','required'=>'required','id'=>'last_name','placeholder'=>'Last Name'])  !!}
                                   @if ($errors->has('last_name'))
                                       <span class="help-block">
                                           <strong>{{ $errors->first('last_name') }}</strong>
                                       </span>
                                   @endif
                               </div>
                           </div>
                       <div class="form-group {{ $errors->has('company_name') ? ' has-error' : '' }}" id="billing_company_field">
                            <label for="company_name" class="col-sm-3 control-label">
                                <span class="grey">Company Name</span>
                            </label>
                            <div class="col-sm-9">
                                {!! Form::text('company_name',$value= null, $attributes = ['class'=>'form-control','placeholder'=>'Company Name'])  !!}
                                @if ($errors->has('company_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('company_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                           <div class="form-group address-field validate-required  {{ $errors->has('address1') ? ' has-error' : '' }}" id="billing_address_fields">
                              <label for="address" class="col-sm-3 control-label">
                                  <span class="grey">Address 1</span>
                                  <span class="required">*</span>
                              </label>
                              <div class="col-sm-9">
                                  {!! Form::text('address1',$value= null, $attributes = ['class'=>'form-control','required'=>'required','placeholder'=>'Address'])  !!}
                                  @if ($errors->has('address1'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('address1') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-9">
                                  <input type="text" class="form-control " name="address2" id="address2" placeholder="Address 2 (optional)">
                              </div>
                          </div>
                          <div class="form-group address-field validate-required" id="billing_city_field">
                              <label for="city" class="col-sm-3 control-label">
                                  <span class="grey">Town / City </span>
                                  <span class="required">*</span>
                              </label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control " name="city" id="city" placeholder="Town / City" required>
                              </div>
                          </div>
                         {{-- <div class="form-group address-field validate-state" id="billing_state_field">
                              <label for="billing_state" class="col-sm-3 control-label">
                                  <span class="grey">County</span>
                              </label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control " value="" placeholder="State / County" name="billing_state" id="billing_state">
                              </div>
                          </div>--}}
                          <div class="form-group address-field validate-required validate-postcode" id="billing_postcode_field">
                              <label for="billing_postcode" class="col-sm-3 control-label">
                                  <span class="grey">Postcode </span>
                                  <span class="required">*</span>
                              </label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" name="zip" id="postcode" placeholder="Postcode / Zip" required>
                              </div>
                          </div>
                          <div class="form-group validate-required validate-email" id="billing_email_field">
                              <label for="email" class="col-sm-3 control-label">
                                  <span class="grey">Email Address </span>
                                  <span class="required">*</span>
                              </label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control " name="email" id="email" placeholder="Email address">
                              </div>
                          </div>
                          <div class="form-group validate-required validate-phone" id="billing_phone_field">
                              <label for="billing_phone" class="col-sm-3 control-label">
                                  <span class="grey">Phone </span>
                                  <span class="required">*</span>
                              </label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control " name="night_phone_a" id="billing_phone" placeholder="Phone" required >
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-9">
                                 {{-- @if(!Auth::check())
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox"> Create an Account?
                                      </label>
                                  </div>
                                  @endif--}}
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="REQCONFIRMSHIPPING" checked value="1"> Shop to Billing Address?
                                      </label>
                                  </div>
                              </div>
                          </div>
                          <div class="form-group">
                              <label for="order_comments" class="col-sm-3 control-label">
                                  <span class="grey">Order Notes</span>
                              </label>
                              <div class="col-sm-9">
                                  <input type="hidden" name="ALLOWNOTE" value="1">
                                  <textarea name="noteToSeller" class="form-control" id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="5"></textarea>
                              </div>
                          </div>
                </div>

                <aside class="col-sm-5 col-md-4 col-lg-4">
                    <h3 class="widget-title" id="order_review_heading">Your order</h3>
                    <div id="order_review" class="shop-checkout-review-order">
                        <table class="table shop_table shop-checkout-review-order-table">
                            <thead>
                            <tr>
                                <td class="product-name">Product</td>
                                <td class="product-total">Total</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="cart_item">
                                <td class="product-name">
                                   Gift Voucher
                                    <span class="product-quantity">× {{ $_GET['quantity'] }}</span>
                                </td>
                                <td class="product-total">
                                   {{-- <span class="amount grey">&euro; 10</span>--}}
                                </td>
                            </tr>
                            </tbody>
                            <tfoot>
                            <tr class="cart-subtotal">
                                <td>Subtotal:</td>
                                <td>
                                    <span class="amount grey">&euro; {{ $_GET['quantity'] * $_GET['price'] }}</span>
                                </td>
                            </tr>
                            <tr class="shipping">
                                <td>Shipping:</td>
                                <td>
                                    <span class="grey">Free Shipping</span>
                                </td>
                            </tr>
                            <tr class="order-total">
                                <td>Total:</td>
                                <td>
												<span class="amount grey">
													<strong>&euro; {{ $_GET['quantity'] * $_GET['price'] }}</strong>
												</span>
                                </td>
                            </tr>
                            </tfoot>
                        </table>
                        <div id="payment" class="shop-checkout-payment">
                            <h3 class="widget-title">Payment</h3>
                            <ul class="list1 no-bullets payment_methods methods">
                                {{--<li class="payment_method_bacs">
                                    <div class="radio">
                                        <label for="payment_method_bacs">
                                            <input id="payment_method_bacs" type="radio" name="payment_method" value="bacs" checked="checked">
                                            <span class="grey">Direct Bank Transfer</span>
                                        </label>
                                    </div>
                                    <div class="payment_box payment_method_bacs">
                                        <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                                    </div>
                                </li>
                                <li class="payment_method_cheque">
                                    <div class="radio">
                                        <label for="payment_method_cheque">
                                            <input id="payment_method_cheque" type="radio" name="payment_method" value="cheque">
                                            <span class="grey">Cheque Payment</span>
                                        </label>
                                    </div>
                                </li>--}}
                                <li class="payment_method_paypal">
                                    <div class="radio">
                                        <div class="payment_box payment_method_bacs">
                                            <p>Your order won’t be shipped until the funds have cleared in our account.</p>
                                        </div>
                                        <label for="payment_method_paypal">
                                            <input id="payment_method_paypal" checked name="landing_page" value="Login" type="radio">
                                            <span class="grey">PayPal</span>
                                        </label>
                                    </div>
                                </li>
                                <li class="payment_method_paypal">
                                    <div class="radio">
                                        <label for="payment_method_card">
                                            <input id="payment_method_card" type="radio" value="Billing" name="landing_page">
                                            <span class="grey">Credit/Debit Card</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                            <div class="place-order">
                                <input type="submit" class="button-t1" name="checkout_place_order" id="place_order" value="Place order">
                            </div>
                        </div>
                    </div>
                </aside>
                </form>
            </div>
        </div>
    </div>
@stop