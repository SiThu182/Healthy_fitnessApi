<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bmi extends Model
{
    protected $fillable = ['user_id','weight','height','date','result','status'];
}
