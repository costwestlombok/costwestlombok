<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class AdvanceImage extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;

    public function advance()
    {
        return $this->belongsTo(\App\Models\Advance::class, 'advance_id', 'id');
    }
}
