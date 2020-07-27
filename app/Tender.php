<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    public $incrementing = false;

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id', 'id');
    }

    public function contract_type()
    {
        return $this->belongsTo('App\ContractType', 'contract_type_id', 'id');
    }

    public function tender_method()
    {
        return $this->belongsTo('App\TenderMethod', 'tender_method_id', 'id');
    }

    public function official()
    {
        return $this->belongsTo('App\Official', 'official_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id', 'id');
    }

    public function tender_status()
    {
        return $this->belongsTo('App\TenderStatus', 'tender_status_id', 'id');
    }

    public function offerer()
    {
        return $this->belongsToMany('App\Offerer', 'tender_offerers', 'offerer_id', 'tender_id');
    }

    public function tender_offerer()
    {
        return $this->hasMany('App\TenderOfferer', 'tender_id', 'id');
    }

    public function award()
    {
        return $this->hasMany('App\Award', 'tender_id', 'id');
    }
}
