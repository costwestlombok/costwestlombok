<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    //
    public $timestamps = false;

    public $fillable = [
    	'state_name',
    	'state_code',
    ];
}
