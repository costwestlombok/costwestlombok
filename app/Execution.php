<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Execution extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    public $incrementing = false;

    public function engage()
    {
        return $this->belongsTo('App\Contract', 'engage_id', 'id');
    }

    public function contract()
    {
        return $this->belongsTo('App\Contract', 'contract_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id', 'id');
    }
}
