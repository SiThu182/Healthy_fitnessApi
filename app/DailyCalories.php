<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DailyCalories extends Model
{
    protected $fillable = ['user_id','date','total','daily_calories_item_id'];
}
