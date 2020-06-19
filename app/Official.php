<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Official extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    public $incrementing = false;

    public function unit()
    {
        return $this->belongsTo('App\OrganizationUnit', 'entity_unit_id', 'id');
    }
}
