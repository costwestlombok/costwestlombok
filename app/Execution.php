<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Execution extends Model
{
    //

    protected $fillable = [
    						'track_execution',
    						'track_engage',
    						'vartime',
    						'varprice',
    						'start_date',
    						'program',
    						'contract_state',
    						'engages_id',
    						'contacts_id',
    						'statuses_id',
    						'user_creation',
    						'user_publication',
    						'published_at'
    						];
}
