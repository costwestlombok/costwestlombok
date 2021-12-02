<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    public $incrementing = false;

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'agency_projects', 'agency_id', 'project_id');
    }

    public function agencyProjects()
    {
        return $this->hasMany(AgencyProject::class);
    }
}
