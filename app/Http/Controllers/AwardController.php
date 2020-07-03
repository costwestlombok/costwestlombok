<?php

namespace App\Http\Controllers;

use App\Award;
use App\ContractMethod;
use App\Status;
use App\Tender;
use Illuminate\Http\Request;

class AwardController extends Controller
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
        $awards = Award::all();
        return view('award.index', compact('awards'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['cost'] = str_replace(",", "", $request->cost);
        $data['contract_estimate_cost'] = str_replace(",", "", $request->contract_estimate_cost);
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
        Award::create($data);
        alert('Success', 'Data saved successfully!', 'success');

        return redirect('/award');
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
        $tenders = Tender::all();
        $contract_methods = ContractMethod::all();
        $status = Status::all();

        return view('award.edit', [
            'tenders' => $tenders,
            'contract_methods' => $contract_methods,
            'status' => $status,
            'award' => $award,
        ]);
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
    public function destroy(Award $award)
    {
        if ($tender->opening_act) {
            Storage::delete($tender->opening_act);
        }
        if ($tender->recomendation_report_act) {
            Storage::delete($tender->recomendation_report_act);
        }
        if ($tender->award_resolution) {
            Storage::delete($tender->award_resolution);
        }
        if ($tender->others) {
            Storage::delete($tender->others);
        }
        $award->delete();
        alert('Success', 'Data deleted successfully!', 'success');
        return back();
    }
}
