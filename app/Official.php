<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    //
    protected $fillable = [
    	'organizations_id',
    	'organization_units_id',
    	'official_name',
    	'position',
    	'email',
    	'phone'
    ];
}
