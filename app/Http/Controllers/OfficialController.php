<?php

namespace App\Http\Controllers;

use App\Official;
use App\Organization;
use App\OrganizationUnit;
use Illuminate\Http\Request;

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
        $this->validate($request, [
            'entity_unit_id' => 'required',
            'name' => 'required',
        ]);

        $data = $request->all();
        Official::create($data);
        alert('Success', 'Data saved successfully!');
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
    public function update(Request $request, Official $official)
    {
        $this->validate($request, [
            'entity_unit_id' => 'required',
            'name' => 'required',
        ]);
        $data = $request->all();
        $official->update($data);
        alert('Success', 'Data updated successfully!');
        return redirect('/official');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Official $official)
    {
        $official->delete();
        alert('Success', 'Data deleted successfully!', 'success');
        return back();
    }
}
