<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\Status;
use App\Tender;
use App\TenderMethod;
use App\Award;



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
        $obj = Award::all();
        return view('award.index', ['obj'=>$obj]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        $tenders = Tender::all();
        $tendermethods = TenderMethod::all();

        $status = Status::all();

        return view('award.create', [ 
                                        'tenders'   => $tenders,
                                        'tendermethods' => $tendermethods,
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
        $obj = new Award([
                            'tenders_id'    => $request->get('tenders_id'),
                            'process_number'    => $request->get('process_number'),
                            'contract_estimate_cost'    => $request->get('contract_estimate_cost'),
                            'participants_number'       => $request->get('participants_number'),
                            'statuses_id'               => $request->get('status'),
                            'tender_methods_id'         => $request->get('tendermethods_id'),

                            'file_opening_act'          => '',
                            'file_recomendation_report_act' => '',
                            'file_award_resolution'     => '',
                            'file_others'               => '',
                        ]);
        $obj->save();
        return redirect('/award')->with('success', 'Data saved!');
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
