<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;
use DataTables;

class OrganizationController extends Controller
{

    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        return view('metronic.organizations.index');
    }
    
    public function create()
    {
        return view('metronic.organizations.edit');
    }
    
    public function store(Request $request)
    {
        Organization::create($request->all());
        return redirect()->route('organization.index');;
    }
    
    public function show(Organization $organization)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Organization $organization)
    {
        return view('metronic.organizations.edit', compact('organization'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Organization $organization)
    {
        $organization->update($request->all());
        return redirect()->route('organization.index');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organization $organization)
    {
        $organization->delete();
        return redirect()->route('organization.index');;
    }

    public function api()
    {
        return DataTables::of(Organization::query())
        ->editColumn('created_at', function ($organization) {
            return date('Y-m-d H:i:s', strtotime($organization->created_at));
        })
        ->addColumn('unit_count', function ($organization) {
            return $organization->unit->count();
        })
        ->orderColumn('unit_count', function ($query, $order) {
            $query->withCount('unit')
            // sortBy(function ($organization) {
            //     return $organization->unit->count();
            // }, $order);
            ->orderBy('unit_count', $order);
        })
        ->make(true);
    }

    public function deleteApi(Organization $organization)
    {
        $organization->delete();
        return redirect()->route('organization.index');;
    }
}
