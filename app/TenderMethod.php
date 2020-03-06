<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenderMethod extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
    	'method_name'
    ];
}
