<?php

namespace App\Http\Controllers;

use App\Models\Award;
use App\Models\ContractMethod;
use App\Models\Status;
use App\Models\Tender;
use Auth;
use Illuminate\Http\Request;
use Session;
use Storage;

class AwardController extends Controller
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
        if (request()->get('query_award')) {
            $awards = Award::where('process_number', 'like', '%'.request()->get('query_award').'%')->latest();
        } else {
            $awards = Award::latest();
        }
        if (request()->type) {
            if (request()->type == 'only_me') {
                if (Auth::user()->type == 'agency') {
                    $awards = $awards->whereIn('tender_id', Tender::whereIn('project_id', Auth::user()->agency->agencyProjects()->pluck('project_id'))->pluck('id'));
                }
            }
        }
        $awards = $awards->paginate(10);

        return view('metronic.award.index', compact('awards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tenders = Tender::all();
        $contract_methods = ContractMethod::all();
        $status = Status::all();

        return view('award.create', [
            'tenders' => $tenders,
            'contract_methods' => $contract_methods,
            'status' => $status,
        ]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['cost'] = str_replace(',', '', $request->cost);
        $data['contract_estimate_cost'] = str_replace(',', '', $request->contract_estimate_cost);
        if ($request->opening_act) {
            $data['opening_act'] = $request->file('opening_act')->store('awards');
        }
        if ($request->recomendation_report_act) {
            $data['recomendation_report_act'] = $request->file('recomendation_report_act')->store('awards');
        }
        if ($request->award_resolution) {
            $data['award_resolution'] = $request->file('award_resolution')->store('awards');
        }
        if ($request->others) {
            $data['others'] = $request->file('others')->store('awards');
        }

        if ($request->contract_method_id) {
            $contract_method = ContractMethod::where('method_name', $request->contract_method_id)->first();
            if ($contract_method) {
                $data['contract_method_id'] = $contract_method->id;
            } else {
                $cm = ContractMethod::create([
                    'method_name' => $request->contract_method_id,
                ]);
                $data['contract_method_id'] = $cm->id;
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
        Award::create($data);
        Session::put('success', trans('labels.saved'));

        return redirect('tender/'.$request->tender_id.'/award');
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
        return view('award.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Award $award)
    {
        $tender = Tender::where('id', $award->tender_id)->first();

        return view('metronic.award.edit', [
            'tender' => $tender,
            'award' => $award,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Award $award)
    {
        $data = $request->all();
        $data['cost'] = str_replace(',', '', $request->cost);
        $data['contract_estimate_cost'] = str_replace(',', '', $request->contract_estimate_cost);
        if ($request->opening_act) {
            if ($award->opening_act) {
                Storage::delete($award->opening_act);
            }
            $data['opening_act'] = $request->file('opening_act')->store('awards');
        }
        if ($request->recomendation_report_act) {
            if ($award->recomendation_report_act) {
                Storage::delete($award->recomendation_report_act);
            }
            $data['recomendation_report_act'] = $request->file('recomendation_report_act')->store('awards');
        }
        if ($request->award_resolution) {
            if ($award->award_resolution) {
                Storage::delete($award->award_resolution);
            }
            $data['award_resolution'] = $request->file('award_resolution')->store('awards');
        }
        if ($request->others) {
            if ($award->others) {
                Storage::delete($award->others);
            }
            $data['others'] = $request->file('others')->store('awards');
        }

        if ($request->contract_method_id) {
            $contract_method = ContractMethod::where('method_name', $request->contract_method_id)->first();
            if ($contract_method) {
                $data['contract_method_id'] = $contract_method->id;
            } else {
                $cm = ContractMethod::create([
                    'method_name' => $request->contract_method_id,
                ]);
                $data['contract_method_id'] = $cm->id;
            }
        } else {
            $data['contract_method_id'] = null;
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
        $award->update($data);
        Session::put('success', trans('labels.updated'));

        return redirect('tender/'.$request->tender_id.'/award');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Award $award)
    {
        if ($award->opening_act) {
            Storage::delete($award->opening_act);
        }
        if ($award->recomendation_report_act) {
            Storage::delete($award->recomendation_report_act);
        }
        if ($award->award_resolution) {
            Storage::delete($award->award_resolution);
        }
        if ($award->others) {
            Storage::delete($award->others);
        }
        $award->delete();
        Session::put('success', trans('labels.deleted'));

        return back();
    }

    public function create_award(Tender $tender)
    {
        return view('metronic.award.edit', compact('tender'));
    }

    public function contract(Award $award)
    {
        $contract = $award->contract;

        return view('metronic.contract.show', compact('contract', 'award'));
    }

    public function contractCreate(Award $award)
    {
        return view('metronic.contract.edit', compact('award'));
    }
}
