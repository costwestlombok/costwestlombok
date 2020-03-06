<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tender extends Model
{
    //
    protected $fillable = [
        'track_tender',
        'track_project',
    	'process_number',
    	'process_name',
    	'file_invitation',
    	'file_qualification_bases',
    	'file_resolution_stating_qualification',
    	'file_call_for_tender',
    	'file_terms_conditions',
    	'file_amendments',
    	'file_acceptance_certificate',
    	'file_others',
    	'projects_id',
    	'organizations_id',
    	'organization_units_id',
    	'officials_id',
    	'roles_id',
    	'contract_types_id',
    	'tender_methods_id',
    	'statuses_id',
        'user_creation',
        'user_publication',
        'published_at'
    ];
}
