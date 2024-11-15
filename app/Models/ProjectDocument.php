<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class ProjectDocument extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;

    public function project()
    {
        return $this->belongsTo(\App\Models\Project::class, 'project_id', 'id');
    }
}
