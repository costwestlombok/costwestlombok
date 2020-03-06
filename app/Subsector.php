<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsector extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
    	'sectors_id',
    	'subsector_name'
    ];
}
