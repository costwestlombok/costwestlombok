<?php

namespace App\Http\Controllers;

use App\Organization;
use App\OrganizationUnit;
use DataTables;
use Illuminate\Http\Request;
use Session;

class OrganizationUnitController extends Controller
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
        return view('metronic.organization_units.index');
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

        return view('metronic.organization_units.edit')->with('organizations', $organizations);
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
        Session::put("success", "Data saved successfully!");
        return redirect('catalog/organization_unit');
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
    public function edit(OrganizationUnit $organization_unit)
    {
        $organizations = Organization::all();
        return view('metronic.organization_units.edit', compact('organization_unit', 'organizations'));

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
        Session::put("success", "Data updated successfully!");

        return redirect('catalog/organization_unit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrganizationUnit $organizationUnit)
    {

        $data = $organizationUnit->delete();
        return response()->json($data);
    }

    public function get_unit($entity)
    {
        $data = OrganizationUnit::where('entity_id', $entity)->get();
        return response()->json($data);
    }

    public function api()
    {
        return DataTables::of(OrganizationUnit::query())
            ->editColumn('created_at', function ($unit) {
                return date('Y-m-d H:i:s', strtotime($unit->created_at));
            })
            ->addColumn('official_count', function ($unit) {
                return $unit->official->count();
            })
            ->orderColumn('official_count', function ($query, $order) {
                $query->withCount('official')
                // sortBy(function ($organization) {
                //     return $organization->unit->count();
                // }, $order);
                    ->orderBy('official_count', $order);
            })
            ->make(true);
    }
}
