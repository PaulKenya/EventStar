<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cart extends Model
{
    protected $fillable=['user_id','event_id','cart_status','cart_tickets','price_per_tickets','event_name'];
}
