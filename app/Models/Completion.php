<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Completion extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;

    protected $dates = [
        'date',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function contract()
    {
        return $this->belongsTo(\App\Models\Contract::class, 'contracts_id', 'id');
    }
}
