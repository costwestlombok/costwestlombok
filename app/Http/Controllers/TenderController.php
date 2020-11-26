<?php

namespace App\Http\Controllers;

use App\ContractType;
use App\Official;
use App\Organization;
use App\OrganizationUnit;
use App\Project;
use App\Status;
use App\Tender;
use App\TenderMethod;
use App\TenderStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;
use Storage;
use Auth;

class TenderController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request()->get('query_tender')) {
            $tenders = Tender::where('project_process_name', 'like', '%'.request()->get('query_tender').'%')->latest();
        } else {
            $tenders = Tender::latest();
        }
        if (request()->type) {
            if (request()->type == 'only_me') {
                if (Auth::user()->type == 'agency') {
                    $tenders = $tenders->whereIn('project_id', Auth::user()->agency->agencyProjects()->pluck('project_id'));
                }
            }
        }
        $tenders = $tenders->paginate(10);
        return view('metronic.tender.index', compact('tenders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int $projectID
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        if ($request->contract_type_id) {
            $contract_type = ContractType::where('type_name', $request->contract_type_id)->first();
            if ($contract_type) {
                $data['contract_type_id'] = $contract_type->id;
            } else {
                $ct = ContractType::create([
                    'type_name' => $request->contract_type_id,
                ]);
                $data['contract_type_id'] = $ct->id;
            }
        }

        if ($request->tender_method_id) {
            $tender_method = TenderMethod::where('method_name', $request->tender_method_id)->first();
            if ($tender_method) {
                $data['tender_method_id'] = $tender_method->id;
            } else {
                $tm = TenderMethod::create([
                    'method_name' => $request->tender_method_id,
                ]);
                $data['tender_method_id'] = $tm->id;
            }
        }

        if ($request->tender_status_id) {
            $tender_status = TenderStatus::where('status_name', $request->tender_status_id)->first();
            if ($tender_status) {
                $data['tender_status_id'] = $tender_status->id;
            } else {
                $ts = TenderStatus::create([
                    'status_name' => $request->tender_status_id,
                ]);
                $data['tender_status_id'] = $ts->id;
            }
        }

        if ($request->status_id) {
            $status = Status::where('status_name', $request->status_id)->first();
            if ($status) {
                $data['status_id'] = $status->id;
            } else {
                $tm = Status::create([
                    'status_name' => $request->status_id,
                ]);
                $data['status_id'] = $tm->id;
            }
        }

        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        $data['duration'] = $start->diffInDays($end);
        $data['amount'] = str_replace(",", "", $request->amount);
        Tender::create($data);
        Session::put('success', trans('labels.saved'));

        return redirect('project/' . $request->project_id . '/tender');
        // return redirect('tender/' . $request->project_id);
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
        $tender = Tender::find($id);
        $project = Project::where('id', $tender->project_id)->first();
        $organizations = Organization::all();
        $units = OrganizationUnit::where('entity_id', $tender->official->unit->org->id ?? null)->get();
        $officials = Official::where('entity_unit_id', $tender->official->unit->id ?? null)->get();
        $statuses = Status::all();
        $projects = Project::all();
        $contract_types = ContractType::all();
        $tender_methods = TenderMethod::all();
        $tender_statuses = TenderStatus::all();

        return view('metronic.tender.edit', [
            'project' => $project,
            'organizations' => $organizations,
            'statuses' => $statuses,
            'projects' => $projects,
            'contract_types' => $contract_types,
            'tender_methods' => $tender_methods,
            'tender_statuses' => $tender_statuses,
            'tender' => $tender,
            'units' => $units,
            'officials' => $officials,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tender $tender)
    {
        $data = $request->all();
        if ($request->evaluation_process) {
            if ($tender->evaluation_process) {
                Storage::delete($tender->evaluation_process);
            }
            $data['evaluation_process'] = $request->file('evaluation_process')->store('tender');
        }
        if ($request->international_invitation) {
            if ($tender->international_invitation) {
                Storage::delete($tender->international_invitation);
            }
            $data['international_invitation'] = $request->file('international_invitation')->store('tender');
        }
        if ($request->basement) {
            if ($tender->basement) {
                Storage::delete($tender->basement);
            }
            $data['basement'] = $request->file('basement')->store('tender');
        }
        if ($request->resolution) {
            if ($tender->resolution) {
                Storage::delete($tender->resolution);
            }
            $data['resolution'] = $request->file('resolution')->store('tender');
        }
        if ($request->convocation) {
            if ($tender->convocation) {
                Storage::delete($tender->convocation);
            }
            $data['convocation'] = $request->file('convocation')->store('tender');
        }
        if ($request->tdr) {
            if ($tender->tdr) {
                Storage::delete($tender->tdr);
            }
            $data['tdr'] = $request->file('tdr')->store('tender');
        }
        if ($request->clarification) {
            if ($tender->clarification) {
                Storage::delete($tender->clarification);
            }
            $data['clarification'] = $request->file('clarification')->store('tender');
        }
        if ($request->acceptance_certificate) {
            if ($tender->acceptance_certificate) {
                Storage::delete($tender->acceptance_certificate);
            }
            $data['acceptance_certificate'] = $request->file('acceptance_certificate')->store('tender');
        }

        if ($request->contract_type_id) {
            $contract_type = ContractType::where('type_name', $request->contract_type_id)->first();
            if ($contract_type) {
                $data['contract_type_id'] = $contract_type->id;
            } else {
                $ct = ContractType::create([
                    'type_name' => $request->contract_type_id,
                ]);
                $data['contract_type_id'] = $ct->id;
            }
        } else {
            $data['contract_type_id'] = null;
        }

        if ($request->tender_method_id) {
            $tender_method = TenderMethod::where('method_name', $request->tender_method_id)->first();
            if ($tender_method) {
                $data['tender_method_id'] = $tender_method->id;
            } else {
                $tm = TenderMethod::create([
                    'method_name' => $request->tender_method_id,
                ]);
                $data['tender_method_id'] = $tm->id;
            }
        } else {
            $data['tender_method_id'] = null;
        }

        if ($request->tender_status_id) {
            $tender_status = TenderStatus::where('status_name', $request->tender_status_id)->first();
            if ($tender_status) {
                $data['tender_status_id'] = $tender_status->id;
            } else {
                $ts = TenderStatus::create([
                    'status_name' => $request->tender_status_id,
                ]);
                $data['tender_status_id'] = $ts->id;
            }
        } else {
            $data['tender_status_id'] = null;
        }

        if ($request->status_id) {
            $status = Status::where('status_name', $request->status_id)->first();
            if ($status) {
                $data['status_id'] = $status->id;
            } else {
                $tm = Status::create([
                    'status_name' => $request->status_id,
                ]);
                $data['status_id'] = $tm->id;
            }
        } else {
            $data['status_id'] = null;
        }

        $data['amount'] = str_replace(",", "", $request->amount);
        $tender->update($data);
        Session::put("success", trans('labels.updated'));
        return redirect('project/' . $request->project_id . '/tender');
        // return redirect('tender/' . $request->project_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tender $tender)
    {
        if ($tender->evaluation_process) {
            Storage::delete($tender->evaluation_process);
        }
        if ($tender->international_invitation) {
            Storage::delete($tender->international_invitation);
        }
        if ($tender->basement) {
            Storage::delete($tender->basement);
        }
        if ($tender->resolution) {
            Storage::delete($tender->resolution);
        }
        if ($tender->convocation) {
            Storage::delete($tender->convocation);
        }
        if ($tender->tdr) {
            Storage::delete($tender->tdr);
        }
        if ($tender->clarification) {
            Storage::delete($tender->clarification);
        }
        if ($tender->acceptance_certificate) {
            Storage::delete($tender->acceptance_certificate);
        }
        $tender->delete();
        Session::put('success', trans('labels.deleted'));
        return back();
    }

    public function index_tender(Project $project)
    {
        if (request()->get('query_tender')) {
            $tenders = Tender::where('project_id', $project->id)->where('project_process_name', 'like', '%'.request()->get('query_tender').'%')->paginate(10);
        } else {
            $tenders = Tender::where('project_id', $project->id)->paginate(10);
        }
        return view('metronic.tender.index', compact('tenders', 'project'));
    }
    public function create_tender(Project $project)
    {
        return view('metronic.tender.edit', compact('project'));
    }

    public function award(Tender $tender)
    {
        if (request()->get('query_award')) {
            $awards = $tender->awards()->where('process_number', 'like', '%'.request()->get('query_award').'%')->paginate(10);
        } else {
            $awards = $tender->awards()->paginate(10);
        }
        return view('metronic.award.index', compact('tender', 'awards'));
    }

    public function awardCreate(Tender $tender)
    {
        return view('metronic.award.edit', compact('tender'));
    }
}
