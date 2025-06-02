<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;

    protected $dates = [
        'published_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function tender()
    {
        return $this->belongsTo(\App\Models\Tender::class, 'tender_id', 'id');
    }

    public function contract()
    {
        return $this->hasOne(\App\Models\Contract::class, 'awards_id', 'id');
    }

    public function contract_method()
    {
        return $this->belongsTo(\App\Models\ContractMethod::class, 'contract_method_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class, 'status_id', 'id');
    }
}
