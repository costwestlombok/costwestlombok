<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    //
    protected $fillable = [
    						'track_advance',
    						'track_execution',
    						'pecent_programmed',
    						'percent_real',
    						'finance_programmed',
    						'finance_real',
    						'description_problems',
    						'description_issues',
    						'advance_date',
    						'file_warranties',
    						'file_advance',
    						'file_supervision',
    						'file_evaluation',
    						'file_technic',
    						'file_finance',
    						'file_reception',
    						'file_unpleased',
    						'executions_id',
    						'statuses_id',
    						'user_creation',
    						'user_publication',
    						'published_at'
    						];
}
