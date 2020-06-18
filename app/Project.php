<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //
    protected $fillable = [
        'organization_code',
        'project_code',
        'project_name',
        'project_description',
        'project_code_sefin',
        'project_budget',
        'project_budget_approved',
        'environment_effect_description',
        'resettlement_description',
        'initial_lat',
        'initial_lon',
        'final_lat',
        'final_lon',
        'file_work_plans',
        'file_budget_multianual_program',
        'file_feasibility_study',
        'file_environment_effect_study',
        'file_environment_license_mitigation_contract',
        'file_resettlement_compensation_plan',
        'file_financing_agreement',
        'file_approval_description',
        'file_others',
        'organizations_id',
        'organization_units_id',
        'sectors_id',
        'subsectors_id',
        'purposes_id',
        'officials_id',
        'roles_id',
        'statuses_id',
        'user_creation',
        'user_publication',
        'published_at',

    ];
}
