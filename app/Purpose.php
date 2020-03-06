<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    //
	public $timestamps = false;

    protected $fillable = [
    	'purpose_name'
    ];
}
