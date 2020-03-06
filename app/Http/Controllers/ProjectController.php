<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Purpose;
use App\Sector;
use App\Organization;
use App\Roles;
use App\Status;
use App\Project;


class ProjectController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $obj = Project::all();
        return view('project.index', ['obj' => $obj]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $purposes = Purpose::all();

        $sectors = Sector::all();

        $organizations = Organization::all();

        $status = Status::all();

        return view('project.create', [ 
                                        'purposes'  => $purposes, 
                                        'sectors'   => $sectors,
                                        'organizations'  => $organizations,
                                        'status'    => $status,
                                    ]
                    );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $obj = new Project(
                        [
                        'project_code'              => $request->get('project_code'),
                        'project_name'              => $request->get('project_name'),
                        'project_description'       => $request->get('project_description'),
                        'project_code_sefin'        => $request->get('project_code_sefin'),
                        'project_budget'            => $request->get('project_budget'),
                        'project_budget_approved'   => 12345.22,
                        'environment_effect_description' => $request->get('environment_description'),
                        'resettlement_description'  => $request->get('resettlement_description'),
                        'initial_lat'               => $request->get('initial_lat'),
                        'initial_lon'               => $request->get('initial_lon'),
                        'final_lat'                 => $request->get('final_lat'),
                        'final_lon'                 => $request->get('final_lon'),

                        'file_work_plans'           => '',
                        'file_budget_multianual_program' => '',
                        'file_feasibility_study'    => '',
                        'file_environment_effect_study' => '',
                        'file_environment_license_mitigation_contract' => '',
                        'file_resettlement_compensation_plan'   => '',
                        'file_financing_agreement'  => '',
                        'file_approval_description' => '',
                        'file_others'               => '',

                        'organizations_id'          => $request->get('organizations_id'),
                        'organization_units_id'     => $request->get('units_id'),
                        'sectors_id'                => $request->get('sectors_id'),
                        'subsectors_id'             => $request->get('subsectors_id'),
                        'purposes_id'               => $request->get('purposes_id'),
                        'officials_id'              => $request->get('officials_id'),
                        'roles_id'                  => 1,
                        'statuses_id'               => $request->get('status'),

                        ]
                        );
        $obj->save();
        return redirect('/project')->with('success', 'saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('project.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
