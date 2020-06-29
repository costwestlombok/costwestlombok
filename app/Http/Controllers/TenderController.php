<?php

namespace App\Http\Controllers;

use App\ContractType;
use App\Organization;
use App\Project;
use App\Status;
use App\Tender;
use App\TenderMethod;
use App\TenderStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
        $tenders = Tender::all();
        return view('tender.index', ['tenders' => $tenders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $projectID
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $organizations = Organization::all();

        $statuses = Status::all();

        $projects = Project::all();

        $contract_types = ContractType::all();

        $tender_methods = TenderMethod::all();
        $tender_statuses = TenderStatus::all();

        return view('tender.create', [
            'organizations' => $organizations,
            'statuses' => $statuses,
            'projects' => $projects,
            'contract_types' => $contract_types,
            'tender_methods' => $tender_methods,
            'tender_statuses' => $tender_statuses,
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
        $data = $request->all();
        if ($request->evaluation_process) {
            $data['evaluation_process'] = $request->file('evaluation_process')->store('tender');
        }
        if ($request->international_invitation) {
            $data['international_invitation'] = $request->file('international_invitation')->store('tender');
        }
        if ($request->basement) {
            $data['basement'] = $request->file('basement')->store('tender');
        }
        if ($request->resolution) {
            $data['resolution'] = $request->file('resolution')->store('tender');
        }
        if ($request->convocation) {
            $data['convocation'] = $request->file('convocation')->store('tender');
        }
        if ($request->tdr) {
            $data['tdr'] = $request->file('tdr')->store('tender');
        }
        if ($request->clarification) {
            $data['clarification'] = $request->file('clarification')->store('tender');
        }
        if ($request->acceptance_certificate) {
            $data['acceptance_certificate'] = $request->file('acceptance_certificate')->store('tender');
        }
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        $data['duration'] = $start->diffInDays($end);

        Tender::create($data);
        alert('Success', 'Data saved successfully!', 'success');

        return back();
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

    public function store_file($file)
    {
        return $file->store('/tender');
    }
}
