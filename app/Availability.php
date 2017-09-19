<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $table="availabilities";

    protected $fillable =[
    	'id','availaDate','motiv'
    ];

    protected $hidden = [];

    protected $casts =[
    	'id'	=> 'integer'
    ];
}
