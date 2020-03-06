<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCities extends Model
{
    //
    protected $fillable = [
    						'projects_id',
    						'states_id',
    						'cities_id',
    						'city_code',
    						'statuses_id',
    						'benefit',
    						'date_published'
    						];
}
