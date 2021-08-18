<?php

namespace App;

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
    public $incrementing = false;

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\Status', 'status_id', 'id');
    }

    public function image()
    {
        return $this->hasMany('App\AdvanceImage', 'advance_id', 'id');
    }
}
