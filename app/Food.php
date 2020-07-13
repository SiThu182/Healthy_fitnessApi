<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['food_name','category_id','calories','food_image'];

    public function category($value='')
    {
    	return $this->belongsTo('App\Category');
    }
}
