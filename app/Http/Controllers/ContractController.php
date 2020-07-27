<?php

namespace App\Http\Controllers;

use App\Award;
use App\Completion;
use App\Contract;
use App\Status;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContractController extends Controller
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
        $contracts = Contract::all();
        return view('contract.index', ['contracts' => $contracts]);
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

        $status = Status::where('status_name', $request->status_id)->first();
        if ($status) {
            $data['status_id'] = $status->id;
        } else {
            $tm = Status::create([
                'status_name' => $request->status_id,
            ]);
            $data['status_id'] = $tm->id;
        }
        Contract::create($data);
        alert('Success', 'Data saved successfully!', 'success');

        return redirect('/contract');
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

    public function completion($contract)
    {
        $data = Completion::where('contracts_id', $contract)->first();
        return view('contract.completion', compact('data', 'contract'));
    }

    public function completion_store(Request $request)
    {
        $data = $request->all();
        // return $data;
        $data['final_cost'] = str_replace(",", "", $request->final_cost);
        Completion::create($data);
        alert('Success', 'Data saved successfully!', 'success');

        return back();
    }

    public function completion_destroy(Completion $completion)
    {
        $completion->delete();
        alert('Success', 'Data deleted successfully!', 'success');

        return back();
    }

    public function create_contract(Award $award)
    {
        return view('metronic.contract.edit', compact('award'));
    }
}
