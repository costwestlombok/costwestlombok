<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    //
    protected $fillable = [
    						'organization_name',
    						'organization_legal_name',
    						'description',
    						'address',
    						'phone',
    						'postal_code',
    						'main',
    						'belongs_to',
    						'active'
    						];
}
