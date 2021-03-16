<?php

namespace App;

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

    public function tender()
    {
        return $this->belongsTo('App\Tender', 'tender_id', 'id');
    }

    public function contract()
    {
        return $this->hasOne('App\Contract', 'awards_id', 'id');
    }

    public function contract_method()
    {
        return $this->belongsTo('App\ContractMethod', 'contract_method_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id', 'id');
    }
}
