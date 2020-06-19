<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class OrganizationUnit extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    use App\Traits\Uuids;
    public $incrementing = false;

    public function org()
    {
        return $this->belongsTo('App/Organization', 'entity_id', 'id');
    }

    public function official()
    {
        return $this->hasMany('App/Official', 'entity_unit_id', 'id');
    }
}
