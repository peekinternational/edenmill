<?php

namespace Edenmill;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
    protected $table = 'transactions';
    protected $fillable = ['payment_status','payer_id','address_zip','address_street','address_name','address_country_code','address_city','payer_status','business','num_cart_item','payer_email','ipn_track_id','payment_date'];
    public $timestamps = false;
}
