<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    public $incrementing = false;

    public function subsector()
    {
        return $this->belongsTo('App/Subsector', 'subsector_id', 'id');
    }

    public function official()
    {
        return $this->belongsTo('App/Official', 'official_id', 'id');
    }

    public function purpose()
    {
        return $this->belongsTo('App/Purpose', 'purpose_id', 'id');
    }

    public function role()
    {
        return $this->belongsTo('App/Role', 'role_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App/Status', 'status_id', 'id');
    }

    public function file()
    {
        return $this->hasMany('App/ProjectDocument', 'project_id', 'id');
    }
}
