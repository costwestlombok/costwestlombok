<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Organization;
use App\OrganizationUnit;

class OrganizationUnitController extends Controller
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
        $units = OrganizationUnit::all();
        return view('organization_units.index', ['units' => $units]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $organizations = Organization::all();

        return view('organization_units.create')->with('organizations', $organizations);
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
        $unit = new OrganizationUnit([
            'unit_name' => $request->get('unit_name'),
            'organizations_id' => $request->get('organizations_id')
        ]);
        $unit->save();
        return redirect('/organization_unit/create')->with('success', 'Unit has been created');
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
        $unit = OrganizationUnit::find($id);
        $organizations = Organization::all();

        return view('organization_units.edit', ['unit' => $unit, 'organizations' => $organizations]);

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
        $unit = OrganizationUnit::find($id);
        $unit->unit_name = $request->get('unit_name');
        $unit->organizations_id = $request->get('organizations_id');
        $unit->save();

        return redirect('organization_unit')->with('success', 'Data has been updated');

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
        $unit = OrganizationUnit::find($id);
        $unit->delete();

        return redirect('organization_unit')->with('succes', 'Record has been destroyed');
    }
}
