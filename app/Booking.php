<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table = "bookings";

    protected $fillable = [
    	'id','client_id','date','product'   	
    ];

    protected $hidden = [];

    protected $casts = [
    	'id'	=>	'integer'
    ];

    public function client()
    {
    	return $this->belongsTo('App\Client');
    }
}
