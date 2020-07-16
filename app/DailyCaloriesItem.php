<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyCaloriesItem extends Model
{
    protected $fillable = ['food_id','quantity'];
}
