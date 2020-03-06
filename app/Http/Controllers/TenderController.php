<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Status;
use App\Tender;
use App\Project;
use App\ContractType;
use App\TenderMethod;


class TenderController extends Controller
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
        $obj = Tender::all();
        $projects = Project::all();

        return view('tender.index', ['obj'=>$obj, 'projects'=> $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $projectID
     * @return \Illuminate\Http\Response
     */
    public function create( $projectID = 0 )
    {
        //

        $organizations = Organization::all();

        $status = Status::all();

        $projects = Project::all();

        $contracttypes = ContractType::all();

        $methods  = TenderMethod::all();

        return view('tender.create', [ 
                                        'organizations'     => $organizations,
                                        'status'            => $status,
                                        'projects'          => $projects,
                                        'contracttypes'     => $contracttypes,
                                        'methods'           => $methods,
                                        'projectID'         => $projectID
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

        $obj = new Tender([
                            'process_number'    => $request->get('process_number'),
                            'process_name'      => $request->get('process_name'),

                            'file_invitation'   => '',
                            'file_qualification_bases' => '',
                            'file_resolution_stating_qualification' => '',
                            'file_call_for_tender'  => '',
                            'file_terms_conditions' => '',
                            'file_amendments'       => '',
                            'file_acceptance_certificate'   => '',
                            'file_others'           => '',

                            'projects_id'       => $request->get('projects_id'),
                            'organizations_id'  => $request->get('organizations_id'),
                            'organization_units_id'  => $request->get('units_id'),
                            'officials_id'      => $request->get('officials_id'),
                            //'roles_id'          => $request->get('roles_id'),
                            'roles_id'          => 1,
                            'contract_types_id' => $request->get('contract_types_id'),
                            'tender_methods_id' => $request->get('tender_methods_id'),
                            'statuses_id'       => $request->get('status'),
                        ]);
        $obj->save();
        return redirect('/tender')->with('success', 'Data saved');
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
        return view('tender.show');
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
