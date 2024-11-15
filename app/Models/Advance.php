<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    protected $dates = [
        'date_of_advance',
        'date_of_publication',
    ];

    protected $casts = [
        'date_of_advance' => 'datetime',
        'date_of_publication' => 'datetime',
    ];

    public $incrementing = false;

    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class, 'project_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo(\App\Models\Status::class, 'status_id', 'id');
    }

    public function image()
    {
        return $this->hasMany(\App\Models\AdvanceImage::class, 'advance_id', 'id');
    }
}
