<?php

namespace App\Http\Controllers;

use App\Organization;
use App\OrganizationUnit;
use Illuminate\Http\Request;

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
        $this->validate($request, [
            'entity_id' => 'required',
        ]);
        $data = $request->all();
        OrganizationUnit::create($data);
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
    public function update(Request $request, OrganizationUnit $organizationUnit)
    {
        $this->validate($request, [
            'entity_id' => 'required',
        ]);
        $data = $request->all();
        $organizationUnit->update($data);
        alert('Success', 'Data updated successfully!', 'success');
        return redirect('/organization_unit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationUnit $organizationUnit)
    {

        $organizationUnit->delete();
        alert('Success', 'Data deleted successfully!', 'success');

        return back();
    }

    public function get_unit($entity)
    {
        $data = OrganizationUnit::where('entity_id', $entity)->get();
        return response()->json($data);
    }
}
