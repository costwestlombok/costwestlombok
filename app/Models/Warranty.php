<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;

    public function type()
    {
        return $this->belongsTo(\App\Models\WarrantyType::class, 'warranty_types_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class, 'status_id', 'id');
    }
}
