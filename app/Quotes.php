<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quotes extends Model
{
    protected $table = "quotes";

    protected $fillable = [
    	'id','name','surname','phone','email','product'   	
    ];

    protected $hidden = [];

    protected $casts = [
    	'id'	=>	'integer'
    ];
}
