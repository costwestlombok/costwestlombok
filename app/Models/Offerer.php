<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Offerer extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;

    public function contract()
    {
        return $this->hasMany(\App\Models\Contract::class, 'suppliers_id', 'id');
    }

    public function tender()
    {
        return $this->belongsToMany(\App\Models\Tender::class, 'tender_offerers', 'offerer_id', 'tender_id');
    }
}
