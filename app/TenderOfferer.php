<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TenderOfferer extends Model
{
    //

    protected $fillable = [
    						'offerers_id',
    						'tenders_id',
    						'track_tender',
    						'statuses_id',
    						'user_creation',
    						'user_publication',
    						'published_at'
    						];
}
