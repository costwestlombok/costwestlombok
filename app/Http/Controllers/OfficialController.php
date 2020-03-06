<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Official;
use App\Organization;
use App\OrganizationUnit;

class OfficialController extends Controller
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
        $officials = Official::all();
        return view('official.index', ['officials' => $officials]);
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
        $units = OrganizationUnit::all();

        return view('official.create', ['organizations' => $organizations, 'units' => $units]);
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

        $official = new Official([
            'organizations_id' => $request->get('organizations_id'),
            'organization_units_id' => $request->get('organization_units_id'),
            'official_name' => $request->get('official_name'),
            'position' => $request->get('position'),
            'email' => $request->get('email'),
            'phone' => $request->get('phone'),
        ]);

        $official->save();
        return redirect('/official/create')->with('success', 'Record has been added');
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
        $official = Official::find($id);


        $organizations = Organization::all();
        $units = OrganizationUnit::all();

        return view('official.edit', ['official' => $official, 'organizations' => $organizations, 'units' => $units]);
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
        $official = Official::find($id);
        $official->organizations_id = $request->get('organizations_id');
        $official->organization_units_id = $request->get('organization_units_id');
        $official->official_name = $request->get('official_name');
        $official->position = $request->get('position');
        $official->phone = $request->get('phone');
        $official->email = $request->get('email');
        $official->save();

        return redirect('/official')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $official = Official::find($id);
        $official->delete();

        return redirect('/official')->with('success', 'Record has been destroyed');
    }
}
