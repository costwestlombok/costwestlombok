<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ContractType;

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
        //
        /*$request->validate([
            'organization_name' => 'required',
            'organization_legal_name' => 'required',
            'description',
            'address' => 'required',
            'phone',
            'postal_code'
        ]);*/

        $contract_type = new ContractType([
            'type_name' => $request->get('type_name'),
        ]);

        $contract_type->save();
        return redirect('/contracttype/create')->with('success', 'Record has been added');
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
    public function update(Request $request, $id)
    {
        //
        $contract_type = ContractType::find($id);
        $contract_type->type_name = $request->get('type_name');
        $contract_type->save();

        return redirect('/contracttype')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contract_type = ContractType::find($id);
        $contract_type->delete();

        return redirect('/contracttype')->with('success', 'Record has been destroyed');
    }
}
