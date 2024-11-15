<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Support\Facades\DB;

class TemporalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $project_code
     * @return \Illuminate\Http\Response
     *
     **/
    public function project($project_code)
    {

        // get project Data
        $data = DB::table('projects')
            ->leftJoin('purposes', 'projects.purposes_id', '=', 'purposes.id')
            ->leftJoin('sectors', 'projects.sectors_id', '=', 'sectors.id')
            ->leftJoin('subsectors', 'projects.subsectors_id', '=', 'subsectors.id')
            ->leftJoin('organizations', 'projects.organizations_id', '=', 'organizations.id')
            ->select('projects.*', 'purposes.purpose_name', 'sectors.sector_name', 'subsectors.subsector_name', 'organizations.organization_name')
            ->where('projects.id', '=', $project_code)
            ->get();

        $contracts = DB::table('cs_contratacion')
            ->join('awards', 'awards.id', '=', 'cs_contratacion.idAdjudicacion')
            ->join('tenders', 'awards.tenders_id', '=', 'tenders.id')
            ->join('projects', 'tenders.projects_id', '=', 'projects.id')
            ->where('projects.id', '=', $project_code)
            ->select('cs_contratacion.*')
            ->get();

        return view('temporal.project', ['data' => $data,
            'contracts' => $contracts,
        ]);
    }

    /**
     * @param  int  $project
     * @return \Illuminate\Http\Response
     *
     **/
    public function project_managment($project)
    {

        $projectData = DB::table('projects')
            ->leftJoin('sectors', 'projects.sectors_id', '=', 'sectors.id')
            ->leftJoin('subsectors', 'projects.subsectors_id', '=', 'subsectors.id')
            ->leftJoin('purposes', 'projects.purposes_id', '=', 'purposes.id')
            ->leftJoin('organization_units', 'projects.organization_units_id', '=', 'organization_units.id')
            ->select('projects.*', 'sectors.sector_name', 'subsectors.subsector_name', 'purposes.purpose_name', 'organization_units.unit_name')
            ->where('projects.id', '=', $project)
            ->paginate(100);

        $tenders = DB::table('tenders')
                        //->join('projects', 'projects.id', '=', 'tenders.projects_id')
            ->leftJoin('organization_units', 'tenders.organization_units_id', '=', 'tenders.organization_units_id')
            ->leftJoin('contract_methods', 'tenders.tender_methods_id', '=', 'contract_methods.id')
            ->leftJoin('contract_types', 'tenders.contract_types_id', '=', 'contract_types.id')
            ->select('tenders.*', 'organization_units.unit_name', 'contract_methods.method_name', 'contract_types.type_name')
            ->where('tenders.projects_id', '=', $project)
            ->get();
        //print_r($tenders);

        $award = DB::table('awards')
            ->join('tenders', 'awards.tenders_id', '=', 'tenders.id')
            ->join('projects', 'tenders.projects_id', '=', 'projects.id')
            ->leftJoin('tender_methods', 'awards.tender_methods_id', '=', 'tender_methods.id')
            ->select('awards.*', 'tender_methods.method_name')
            ->where('projects.id', '=', $project)
            ->get();

        $contract = DB::table('contracts')
            ->leftJoin('organizations', 'contracts.organizations_id', '=', 'organizations.id')
            ->leftJoin('offerers', 'contracts.offerers_id', '=', 'offerers.id')
            ->join('awards', 'contracts.awards_id', '=', 'awards.id')
            ->join('tenders', 'awards.tenders_id', '=', 'tenders.id')
            ->join('projects', 'tenders.projects_id', '=', 'projects.id')
            ->select('contracts.*', 'organizations.organization_name', 'offerers.offerer_name')
            ->where('projects.id', '=', $project)
            ->get();

        return view('temporal.project_managment', [
            'project' => $projectData,
            'tender' => $tenders,
            'award' => $award,
            'contract' => $contract,
        ]);

    }
}
