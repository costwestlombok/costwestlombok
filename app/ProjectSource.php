<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectSource extends Model
{
    //
    protected $fillable = [
    						'track_project',
    						'ammount',
    						'exchange_rate',
    						'projects_id',
    						'sources_id',
    						'statuses_id',
    						'currencies_id',
    						'user_creation',
    						'user_publication',
    						'published_at'

    						];
}
