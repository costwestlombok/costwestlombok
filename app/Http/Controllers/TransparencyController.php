<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransparencyController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function map()
    {

        return view('transparency.map');
    }

    /**
     * Display a listing of the resource.
     *
     * @param  string  $organization
     * @return \Illuminate\Http\Response
     */
    public function citizens($organization = '')
    {

        $data = DB::table('projects')
            ->join('project_cities', 'projects.id', '=', 'project_cities.projects_id')
            ->join('states', 'states.id', '=', 'project_cities.states_id')
            ->select('states.state_name', DB::raw('SUM(project_budget) as invest'))
            ->groupby('states.id')
            ->get();

        $statesMap = [
            'HN-AT' => 1,
            'HN-CL' => 2,
            'HN-CM' => 3,
            'HN-CP' => 4,
            'HN-CR' => 5,
            'HN-CH' => 6,
            'HN-EP' => 7,
            'HN-FM' => 8,
            'HN-GD' => 9,
            'HN-IN' => 10,
            'HN-IB' => 11,
            'HN-LP' => 12,
            'HN-LE' => 13,
            'HN-OC' => 14,
            'HN-OL' => 15,
            'HN-SB' => 16,
            'HN-VA' => 17,
            'HN-YO' => 18,
        ];

        return view('transparency.citizens', ['data' => $data, 'organization' => $organization, 'statesMap' => $statesMap]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function faq()
    {

        $instituciones = [
            'HONDUTEL' => 'hondutel',
            'ENP' => 'enp',
            'Fondo Vial' => 'fondovial',
            'INSEP' => 'insep',
            'InvestH' => 'invest',
            'ENEE' => 'enee',
            'IDECOAS' => 'idecoas',
            'SESAL' => 'sesal',
            'SEDUC' => 'seduc',
        ];

        return view('transparency.faq', ['instituciones' => $instituciones]);
    }

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

        $contractData = [];

        $contracts = DB::table('projects')
            ->join('tenders', 'tenders.projects_id', '=', 'projects.id')
            ->join('awards', 'awards.tenders_id', '=', 'tenders.id')
            ->join('engages', 'engages.awards_id', '=', 'awards.id')
            ->join('tender_methods', 'tenders.tender_methods_id', '=', 'tender_methods.id')
            ->leftJoin('offerers', 'engages.offerers_id', '=', 'offerers.id')
            ->where('projects.id', '=', $project_code)
            ->select('tenders.process_number', 'tenders.process_name', 'awards.track_award', 'engages.track_engage', 'engages.start_date', 'engages.end_date', 'engages.duration', 'engages.contract_scope', 'engages.price_local_currency', 'engages.price_usd_currency', 'tender_methods.method_name', 'offerers.offerer_name')
            ->get();

        return view('transparency.project', ['project_code' => $project_code,
            'data' => $data,
            'contracts' => $contracts]);
    }

    /**
     * @param  int  $project,  int $track_engage
     * @return \Illuminate\Http\Response
     *
     **/
    public function project_managment($project, $track_engage)
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
            ->leftJoin('contract_methods', 'awards.contract_methods_id', '=', 'contract_methods.id')
            ->select('awards.*', 'contract_methods.method_name')
            ->where('projects.id', '=', $project)
            ->get();

        $engage = DB::table('engages')
            ->leftJoin('offerers', 'engages.offerers_id', '=', 'offerers.id')
            ->leftJoin('organizations', 'engages.organizations_id', '=', 'organizations.id')
            ->join('awards', 'engages.awards_id', '=', 'awards.id')
            ->select('engages.*', 'organizations.organization_name', 'offerers.offerer_name')
            ->where('engages.track_engage', '=', $track_engage)
            ->get();

        $contracts = DB::table('contracts')->select('contracts.*')->where('contracts.track_engage', '=', $track_engage)->get();

        $disbursments = DB::table('disbursements')
            ->join('executions', 'disbursements.executions_id', '=', 'executions.id')
            ->where('executions.track_engage', '=', $track_engage)
            ->select('disbursements.*')
            ->get();

        $advances = DB::table('advances')
            ->join('executions', 'executions.id', '=', 'advances.executions_id')
            ->where('executions.track_engage', '=', $track_engage)
            ->select('advances.*')
            ->geT();

        $warranties = DB::table('warranties')
            ->join('warranty_types', 'warranties.warranty_types_id', 'warranty_types.id')
            ->join('executions', 'executions.id', '=', 'warranties.executions_id')
            ->where('executions.track_engage', '=', $track_engage)
            ->select('warranties.*', 'warranty_types.type_name')
            ->get();

        return view('transparency.project_managment', [
            'project' => $projectData,
            'tender' => $tenders,
            'award' => $award,
            'engage' => $engage,
            'contracts' => $contracts,
            'disbursements' => $disbursments,
            'advances' => $advances,
            'warranties' => $warranties,
        ]);

    }

    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function search_results(Request $request)
    {

        $words = $request->get('palabras');
        $place = intval($request->get('municipio'));
        $org = $request->get('entidad');

        //print_r($_POST);

        $query = DB::table('projects')
            ->join('organizations', 'projects.organizations_id', '=', 'organizations.id')
            ->join('project_cities', 'project_cities.projects_id', '=', 'projects.id')
            ->leftJoin('states', 'project_cities.states_id', '=', 'states.id')
            ->select('projects.id', 'projects.project_code', 'projects.project_name', 'organizations.organization_name', 'states.state_name');
        if (! empty($words)) {
            $query->where('projects.project_description', 'like', '%'.$words.'%');
        }
        if ($place > 0) {
            $query->where('project_cities.states_id', '=', $place);
        }
        if ($org > 0) {
            $query->where('projects.organizations_id', '=', $org);
        }
        $rows = $query->get();

        //print_r($rows);

        //exit();

        $instituciones = [
            'HONDUTEL' => 'hondutel',
            'ENP' => 'enp',
            'Fondo Vial' => 'fondovial',
            'INSEP' => 'insep',
            'InvestH' => 'invest',
            'ENEE' => 'enee',
            'IDECOAS' => 'idecoas',
            'SESAL' => 'sesal',
            'SEDUC' => 'seduc',
        ];

        return view('transparency.search_results', ['rows' => $rows, 'instituciones' => $instituciones]);
    }

    public function project_states(Request $request)
    {

        $depto = $request->get('id');

        $data = DB::table('projects')
            ->join('project_cities', 'projects.id', '=', 'project_cities.projects_id')
            ->join('states', 'states.id', '=', 'project_cities.states_id')
            ->select('states.state_name', 'projects.*')
            ->where('states.id', '=', $depto)
            ->get();

        return response()->json($data);

    }
}
