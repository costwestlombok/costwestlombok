<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class TenderOfferer extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;

    public function tender()
    {
        return $this->belongsTo(\App\Models\Tender::class, 'tender_id', 'id');
    }

    public function offerer()
    {
        return $this->belongsTo(\App\Models\Offerer::class, 'offerer_id', 'id');
    }
}
