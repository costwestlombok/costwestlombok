<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\OrganizationUnit;
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'entity_id' => 'required',
        ]);
        $data = $request->all();
        OrganizationUnit::create($data);
        Session::put('success', trans('labels.saved'));

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
        Session::put('success', trans('labels.updated'));

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
                $query->withCount('official')->orderBy('official_count', $order);
                // sortBy(function ($organization) {
                //     return $organization->unit->count();
                // }, $order);
            })
            ->addColumn('organization_name', function ($unit) {
                return $unit->org->name;
            })
            ->orderColumn('organization_name', function ($query, $order) {
                $query->join('organizations', 'organizations.id', '=', 'organization_units.entity_id')->orderBy('organizations.name', $order);
            })
            ->make(true);
    }
}
