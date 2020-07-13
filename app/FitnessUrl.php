<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FitnessUrl extends Model
{
    protected $fillable = ['url_name','url_address','gender'];
}
