<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;

    protected $dates = [
        'start_date',
        'end_date',
    ];

    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
    ];

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class, 'status_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(\App\Models\Offerer::class, 'suppliers_id', 'id');
    }

    public function award()
    {
        return $this->belongsTo(\App\Models\Award::class, 'awards_id', 'id');
    }

    public function ammendment()
    {
        return $this->hasMany(\App\Models\Ammendment::class, 'engage_id', 'id');
    }

    public function execution()
    {
        return $this->hasOne(\App\Models\Execution::class, 'engage_id', 'id');
    }

    public function completion()
    {
        return $this->hasOne(\App\Models\Completion::class, 'contracts_id', 'id');
    }
}
