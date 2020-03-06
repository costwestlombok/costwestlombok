<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warranty extends Model
{
    //
    protected $fillable = [
    						'track_execution',
    						'ammount',
    						'expiration_date',
    						'executions_id',
    						'warranty_types_id',
    						'statuses_id',
    						'user_creation',
    						'user_publication',
    						'published_at'
    						];
}
