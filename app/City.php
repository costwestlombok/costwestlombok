<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    //
    public $timestams = false;

    protected $fillable = [
    	'states_id',
    	'city_name',
    	'city_code'
    ];

}
