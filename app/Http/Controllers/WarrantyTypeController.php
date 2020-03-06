<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WarrantyType;

class WarrantyTypeController extends Controller
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
        $sectors = Sector::all();
        return view('sector.index', ['sectors' => $sectors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('sector.create');
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

        $sector = new Sector([
            'sector_name' => $request->get('sector_name'),
        ]);

        $sector->save();
        return redirect('/sector/create')->with('success', 'Section has been added');
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
        $sector = Sector::find($id);
        return view('sector.edit', ['sector' => $sector]);
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
        $sector = Sector::find($id);
        $sector->sector_name = $request->get('sector_name');
        $sector->save();

        return redirect('/sector')->with('sectors', 'data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = Sector::find($id);
        $sector->delete();

        return redirect('/sector')->with('success', 'Sector has been destroyed');
    }
}
