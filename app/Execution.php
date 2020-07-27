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

    public function contact()
    {
        return $this->belongsTo('App\Contact', 'contact_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id', 'id');
    }

    public function warranty()
    {
        return $this->hasMany('App\Warranty', 'executions_id', 'id');
    }
}
