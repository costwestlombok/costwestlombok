<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class OrganizationUnit extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;

    public function org()
    {
        return $this->belongsTo(\App\Models\Organization::class, 'entity_id', 'id');
    }

    public function official()
    {
        return $this->hasMany(\App\Models\Official::class, 'entity_unit_id', 'id');
    }
}
