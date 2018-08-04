<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class events extends Model
{
    protected $fillable=['event_type','event_name','event_description','event_date','event_time','event_location','number_of_tickets_available','price_per_ticket','event_image','event_host'];
}
