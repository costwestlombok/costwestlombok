<?php

namespace App\Http\Controllers;

use App\Ammendment;
use App\Contract;
use App\Status;
use Illuminate\Http\Request;

class AmmendmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ammendments = Ammendment::all();
        return view('ammendment.index', compact('ammendments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contracts = Contract::all();
        $status = Status::all();
        return view('ammendment.create', compact('contracts', 'status'));
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
        Ammendment::create($data);
        alert('Success', 'Data saved successfully!', 'success');

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
}
