<?php

namespace App\Models;

use App\Traits\Uuids;
use Illuminate\Database\Eloquent\Model;

class ProjectCities extends Model
{
    use Uuids;

    protected $keyType = 'uuid';

    protected $guarded = [];

    public $incrementing = false;
}
