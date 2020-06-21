<?php

namespace App\Http\Controllers;

use App\Sector;
use App\Subsector;
use Illuminate\Http\Request;

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
        $this->validate($request, [
            'sector_id' => 'required',
            'subsector_name' => 'required',
        ]);
        $data = $request->all();
        Subsector::create($data);
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
    public function update(Request $request, Subsector $subsector)
    {
        $this->validate($request, [
            'sector_id' => 'required',
            'subsector_name' => 'required',
        ]);
        $data = $request->all();
        $subsector->update($data);
        alert('Success', 'Data updated successfully!', 'success');

        return redirect('/subsector');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subsector $subsector)
    {
        $subsector->delete();
        alert('Success', 'Data deleted successfully!', 'success');

        return back();
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

    public function get_subsector($sector)
    {
        $data = Subsector::where('sector_id', $sector)->get();
        return response()->json($data);
    }

}
