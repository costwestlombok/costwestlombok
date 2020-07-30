<?php

namespace App;

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
        return $this->belongsTo('App\Project', 'project_id', 'id');
    }
    public function budget()
    {
        return $this->belongsTo('App\Budget', 'budget_id', 'id');
    }
    public function source()
    {
        return $this->belongsTo('App\Source', 'source_id', 'id');
    }

}
