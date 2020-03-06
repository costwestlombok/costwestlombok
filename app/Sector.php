<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
    	'sector_name'
    ];
}
