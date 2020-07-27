<?php

namespace App\Http\Controllers;

use App\Ammendment;
use App\Contract;
use App\Status;
use DataTables;
use Illuminate\Http\Request;
use Session;

class AmmendmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('metronic.ammendment.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $contracts = Contract::all();
        // $status = Status::all();
        // return view('ammendment.create', compact('contracts', 'status'));
        return view('metronic.ammendment.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'engage_id' => 'required',
            'justification' => 'required',
            'modification_number' => 'required',
            'modification_type' => 'required',
        ]);
        $data = $request->all();
        $data['current_price'] = str_replace(",", "", $request->current_price);
        if ($request['adendum']) {
            $data['adendum'] = $request->file('adendum')->store('adendum');
        }
        $status = Status::where('status_name', $request->status_id)->first();
        if ($status) {
            $data['status_id'] = $status->id;
        } else {
            $tm = Status::create([
                'status_name' => $request->status_id,
            ]);
            $data['status_id'] = $tm->id;
        }
        Ammendment::create($data);
        Session::put('success', 'Data saved successfully!');

        return redirect('/ammendment');
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

    public function api($contract)
    {
        return DataTables::of(Ammendment::query()->where('engage_id', $contract))
            ->editColumn('created_at', function ($ammendment) {
                return date('Y-m-d H:i:s', strtotime($ammendment->created_at));
            })
            ->editColumn('current_price', function ($ammendment) {
                return number_format($ammendment->current_price);
            })
            ->make(true);
    }

    public function ammendment(Contract $contract)
    {
        return view('metronic.ammendment.index', compact('contract'));
    }

    public function create_ammendment(Contract $contract)
    {
        return view('metronic.ammendment.edit', compact('contract'));
    }
}
