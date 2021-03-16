<?php

namespace App;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class Completion extends Model
{
    use Uuids;
    protected $keyType = 'uuid';
    protected $guarded = [];
    public $incrementing = false;
    protected $dates = [
        'date'
    ];

    public function contract()
    {
        return $this->belongsTo('App\Contract', 'contracts_id', 'id');
    }
}
