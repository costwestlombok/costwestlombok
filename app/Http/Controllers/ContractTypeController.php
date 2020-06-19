<?php

namespace App\Http\Controllers;

use App\ContractType;
use Illuminate\Http\Request;

class ContractTypeController extends Controller
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
        $contract_types = ContractType::all();
        return view('contract_type.index', ['contract_types' => $contract_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contract_type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type_name' => 'required',
        ]);

        $data = $request->all();
        ContractType::create($data);
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
        $contract_type = ContractType::find($id);
        return view('contract_type.edit', ['contract_type' => $contract_type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContractType $contracttype)
    {
        $this->validate($request, [
            'type_name' => 'required',
        ]);

        $data = $request->all();
        $contracttype->update($data);
        alert('Success', 'Data updated successfully!', 'success');

        return redirect('/contracttype');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractType $contracttype)
    {
        $contracttype->delete();
        alert('Success', 'Data deleted successfully!', 'success');

        return back();
    }
}
