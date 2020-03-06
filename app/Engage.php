<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Engage extends Model
{
    //
    protected $fillable = [
                'track_engage',
                'track_award',
    			'contract_number',
    			'contract_title',
                'contract_scope',
    			'price_local_currency',
    			'price_usd_currency',
    			'contract_notes',
                'duration',
    			'start_date',
    			'end_date',
    			'awards_id',
    			'organizations_id',
    			'offerers_id',
    			'statuses_id',
                'user_creation',
                'user_publication',
                'published_at'
    		];
}
