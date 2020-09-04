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
        return $this->belongsTo(Project::class);
    }

    public function contract_type()
    {
        return $this->belongsTo(ContractType::class);
    }

    public function tender_method()
    {
        return $this->belongsTo(TenderMethod::class);
    }

    public function official()
    {
        return $this->belongsTo(Official::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function tender_status()
    {
        return $this->belongsTo(TenderStatus::class);
    }

    public function offerer()
    {
        return $this->belongsToMany(Offerer::class, 'tender_offerers', 'offerer_id', 'tender_id');
    }

    public function tender_offerer()
    {
        return $this->hasMany(TenderOfferer::class);
    }

    public function awards()
    {
        return $this->hasMany(Award::class);
    }
}
