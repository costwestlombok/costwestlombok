<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    protected $dates = [
        'start_date',
        'end_date',
        'date_of_approved',
        'date_of_publication',
        'created_at',
        'updated_at',
    ];
    public $incrementing = false;

    public function subsector()
    {
        return $this->belongsTo(Subsector::class);
    }

    public function official()
    {
        return $this->belongsTo(Official::class);
    }

    public function purpose()
    {
        return $this->belongsTo(Purpose::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function file()
    {
        return $this->hasMany(ProjectDocument::class);
    }

    public function tenders()
    {
        return $this->hasMany(Tender::class);
    }

    public function latest_progress()
    {
        return $this->hasOne('App\Advance')->orderBy('date_of_advance', 'desc');
    }

    public function project_source()
    {
        return $this->hasMany(ProjectSource::class);
    }

    public function project_budget()
    {
        return $this->hasMany(Budget::class);
    }

    public function projectStatus()
    {
        return $this->belongsTo(ProjectStatus::class);
    }

    public function projectProgresses()
    {
        return $this->hasMany(Advance::class);
    }
}
