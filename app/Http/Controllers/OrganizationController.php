<?php

namespace App\Http\Controllers;

use App\Organization;
use Illuminate\Http\Request;

class OrganizationController extends Controller
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
        $organizations = Organization::all();
        return view('organizations.index', ['organizations' => $organizations]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('organizations.create');
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

        $organization = new organization([
            'organization_name' => $request->get('organization_name'),
            'organization_legal_name' => $request->get('organization_legal_name'),
            'description' => $request->get('description'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'postal_code' => $request->get('postal_code'),
        ]);

        $organization->save();
        return redirect('/organization')->with('success', 'Organization has been added');
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
        $organization = Organization::find($id);
        return view('organizations.edit', ['organization' => $organization]);
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
        $organization = Organization::find($id);
        $organization->organization_name = $request->get('organization_name');
        $organization->organization_legal_name = $request->get('organization_legal_name');
        $organization->description = $request->get('description');
        $organization->address = $request->get('address');
        $organization->phone = $request->get('phone');
        $organization->postal_code = $request->get('postal_code');
        $organization->save();

        return redirect('/organization')->with('success', 'Data has been updated');

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
        $organization = Organization::find($id);
        $organization->delete();

        return redirect('/organization')->with('success', 'Record has been deleted');
    }
}
