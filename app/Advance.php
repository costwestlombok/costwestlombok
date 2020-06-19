<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    public $incrementing = false;

    public function project()
    {
        return $this->belongsTo('App\Project', 'project_id', 'id');
    }

    public function status()
    {
        return $this->belongsTo('App\status', 'status_id', 'id');
    }
}
