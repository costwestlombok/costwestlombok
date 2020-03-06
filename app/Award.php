<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    //
    protected $fillable = [
        'track_award',
        'track_tender',
    	'process_number',
    	'contract_estimate_cost',
    	'participants_number',
    	'file_opening_act',
    	'file_recomendation_report_act',
    	'file_award_resolution',
    	'file_others',
    	'tenders_id',
    	'tender_methods_id',
    	'statuses_id',
        'user_creation',
        'user_publication',
        'published_at'
    ];
}
