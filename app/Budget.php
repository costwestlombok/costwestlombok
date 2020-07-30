<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    public $incrementing = false;

    public function source()
    {
        return $this->hasMany('App\ProjectSource', 'budget_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id', 'id');
    }
}
