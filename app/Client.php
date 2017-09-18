<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';

   	protected $fillable = [
   		'id','name','surname','phone','email'
   	];

   	protected $hidden = [];

   	protected $casts = [
   		'id'	=>	'integer'
   	];

   	public function booking()
   	{
   		return $this->hasMany('App/Booking');
   	}
}
