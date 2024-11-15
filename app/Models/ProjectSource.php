<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class ProjectSource extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;

    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class, 'project_id', 'id');
    }

    public function budget()
    {
        return $this->belongsTo(\App\Models\Budget::class, 'budget_id', 'id');
    }

    public function source()
    {
        return $this->belongsTo(\App\Models\Source::class, 'source_id', 'id');
    }
}
