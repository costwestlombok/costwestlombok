<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrganizationUnit extends Model
{
    //
    protected $fillable = [
    			'unit_name',
    			'organizations_id'
    			];
}
