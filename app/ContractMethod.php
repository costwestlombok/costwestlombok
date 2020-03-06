<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContractMethod extends Model
{
    //
    public $timestamps = false;

    protected $fillable = [
    	'method_name'
    ];
}
