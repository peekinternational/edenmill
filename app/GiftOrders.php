<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class GiftOrders extends Model
{
        use Notifiable;
        protected $fillable = ['payment_status', 'payer_id', 'address_zip', 'address_street', 'address_name', 'address_country_code', 'address_city', 'payer_status', 'payer_email', 'ipn_track_id', 'payment_date','price','quantity','tax1','type','_token'];
        protected $table = 'gift_orders';
        public $timestamps = false;
}

