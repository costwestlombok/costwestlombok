<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;

    public function subsector()
    {
        return $this->hasMany(\App\Models\Subsector::class, 'sector_id', 'id');
    }
}
