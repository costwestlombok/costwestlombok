<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    public $incrementing = false;

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Offerer', 'suppliers_id', 'id');
    }

    public function award()
    {
        return $this->belongsTo('App\Award', 'awards_id', 'id');
    }

}
