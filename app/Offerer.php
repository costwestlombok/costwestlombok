<?php

namespace App;

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
        return $this->hasMany('App\Contract', 'suppliers_id', 'id');
    }

    public function tender()
    {
        return $this->belongsToMany('App\Tender', 'tender_offerers', 'offerer_id', 'tender_id');
    }
}
