<?php

namespace App\Models;

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
        return $this->belongsTo(\App\Models\Contract::class, 'engage_id', 'id');
    }

    public function contact()
    {
        return $this->belongsTo(\App\Models\Contact::class, 'contact_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class, 'status_id', 'id');
    }

    public function warranty()
    {
        return $this->hasMany(\App\Models\Warranty::class, 'executions_id', 'id');
    }
}
