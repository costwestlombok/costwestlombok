<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    public $incrementing = false;

    public function unit()
    {
        return $this->hasMany('App/OrganizationUnit', 'entity_id', 'id');
    }
}
