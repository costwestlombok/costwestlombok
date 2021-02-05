<?php

namespace App\Http\Controllers;

use App\Award;
use App\Completion;
use App\Contract;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class ContractController extends Controller
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
        if (request()->get('query_contract')) {
            $contracts = Contract::where('contract_title', 'like', '%'.request()->get('query_contract').'%')->latest()->paginate(10);
        } else {
            $contracts = Contract::latest()->paginate(10);
        }
        return view('metronic.contract.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $awards = Award::all();
        $status = Status::all();

        return view('contract.create', [
            'awards' => $awards,
            'status' => $status,
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
        // return $data;
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        $data['duration'] = $start->diffInDays($end);
        $data['price_local_currency'] = str_replace(",", "", $request->price_local_currency);
        $data['price_usd_currency'] = str_replace(",", "", $request->price_usd_currency);

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
        Contract::create($data);
        Session::put('success', trans('labels.saved'));
        $tender = \App\Award::find($request->awards_id)->tender;
        return redirect('tender/' . $tender->id . '/award');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        //
        return view('metronic.contract.show', compact('contract'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        $award = Award::where('id', $contract->award->id)->first();
        return view('metronic.contract.edit', compact('contract', 'award'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        $data = $request->all();
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        $data['duration'] = $start->diffInDays($end);
        $data['price_local_currency'] = str_replace(",", "", $request->price_local_currency);
        $data['price_usd_currency'] = str_replace(",", "", $request->price_usd_currency);

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
        $contract->update($data);
        Session::put('success', trans('labels.updated'));
        return redirect('contract/' . $contract->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $id = $contract->award->tender->id;
        $contract->delete();
        Session::put('success', trans('labels.deleted'));
        return redirect('tender/' . $id . '/award');
    }

    public function completion(Contract $contract)
    {
        $completion = $contract->completion;
        return view('metronic.completion.show', compact('completion', 'contract'));
    }

    public function completionCreate(Contract $contract)
    {
        return view('metronic.completion.edit', compact('contract'));
    }

    public function completion_edit(Completion $completion)
    {
        $contract = Contract::where('id', $completion->contracts_id)->first();
        return view('metronic.completion.edit', compact('contract', 'completion'));
    }

    public function completion_store(Request $request)
    {
        $data = $request->all();
        // return $data;
        $data['final_cost'] = str_replace(",", "", $request->final_cost);
        $c = Completion::create($data);
        Session::put('success', trans('labels.saved'));

        return redirect('contract/' . $c->contract->id . '/completion');
    }

    public function completion_update(Request $request, Completion $completion)
    {
        $data = $request->all();
        // return $data;
        $data['final_cost'] = str_replace(",", "", $request->final_cost);
        $completion->update($data);
        Session::put('success', trans('labels.updated'));

        return redirect('contract-completion/' . $completion->id);
    }

    public function completion_destroy(Completion $completion)
    {
        $id = $completion->contract->id;
        $completion->delete();
        Session::put('success', trans('labels.deleted'));

        return redirect('contract/' . $id);
    }

    public function create_contract(Award $award)
    {
        return view('metronic.contract.edit', compact('award'));
    }

    public function ammendment(Contract $contract)
    {
        return view('metronic.ammendment.index', compact('contract'));
    }

    public function ammendmentCreate(Contract $contract)
    {
        return view('metronic.ammendment.edit', compact('contract'));
    }

    public function execution(Contract $contract)
    {
        $execution = $contract->execution;
        return view('metronic.execution.index', compact('execution', 'contract'));
    }

    public function executionCreate(Contract $contract)
    {
        return view('metronic.execution.edit', compact('contract'));
    }
}
