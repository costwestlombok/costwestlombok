<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Subsector extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    public $incrementing = false;

    public function sector()
    {
        return $this->belongsTo('App\Sector', 'sector_id', 'id');
    }
}
