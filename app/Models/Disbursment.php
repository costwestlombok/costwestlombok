<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Disbursment extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;

    public function execution()
    {
        return $this->belongsTo(\App\Models\Execution::class, 'executions_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class, 'status_id', 'id');
    }
}
