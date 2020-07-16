<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WaterIntake extends Model
{
    protected $fillable = ['user_id','weight','height','date','age','gender','result'];
}
