<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subsector;
use App\Sector;

class SubsectorController extends Controller
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
        $subsectors = Subsector::all();
        return view('subsector.index', ['subsectors' => $subsectors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $sectors = Sector::all();
        return view('subsector.create', ['sectors' => $sectors]);
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

        $subsector = new Subsector([
            'sectors_id' => $request->get('sectors_id'),
            'subsector_name' => $request->get('subsector_name'),
        ]);

        $subsector->save();
        return redirect('/subsector/create')->with('success', 'Record has been added');
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
        $subsector = Subsector::find($id);

        $sectors = Sector::all();

        return view('subsector.edit', ['subsector' => $subsector, 'sectors' => $sectors]);
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
        $subsector = Subsector::find($id);
        $subsector->subsector_name = $request->get('subsector_name');
        $subsector->sectors_id = $request->get('sectors_id');
        $subsector->save();

        return redirect('/subsector')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subsector = Subsector::find($id);
        $subsector->delete();

        return redirect('/subsector')->with('success', 'Record has been destroyed');
    }

    /**
     * Show subsector un ajax request
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function ajax_get_subsector($id)
    {
        //$subsector = Subsector::find($sector);

        echo "something";
        return response()->json(['a' => 'A', 'name' => 'Carlos']);
    }

}
