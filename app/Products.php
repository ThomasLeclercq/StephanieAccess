<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $fillable = [
    	'id','name','price','category_id','description','status',
    ];

    protected $hidden = [];

    protected $casts = [
    	'id'	=>	'integer'
    ];

    public function category()
    {
    	return $this->belongsTo('App\Category');
    }
}
