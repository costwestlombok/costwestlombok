<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Source extends Model
{
    //
    protected $fillable = [
    	'source_name',
    	'acronym'
    ];
}
