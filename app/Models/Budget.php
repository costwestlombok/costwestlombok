<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    protected $dates = [
        'start_date',
        'end_date',
    ];

    public $incrementing = false;

    public function source()
    {
        return $this->hasMany(\App\Models\ProjectSource::class, 'budget_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class, 'project_id', 'id');
    }
}
