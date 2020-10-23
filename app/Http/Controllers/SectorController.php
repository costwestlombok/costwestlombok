<?php

namespace App\Http\Controllers;

use App\Sector;
use DataTables;
use Illuminate\Http\Request;
use Session;

class SectorController extends Controller
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
        return view('metronic.sector.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('metronic.sector.edit');
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
            'sector_name' => 'required',
        ]);

        $data = $request->all();
        Sector::create($data);
        Session::put("success", trans('labels.saved'));
        return redirect('/catalog/sector');
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
    public function edit(Sector $sector)
    {
        return view('metronic.sector.edit', compact('sector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sector $sector)
    {
        $this->validate($request, [
            'sector_name' => 'required',
        ]);

        $data = $request->all();
        $sector->update($data);
        Session::put("success", trans('labels.updated'));
        return redirect('/catalog/sector');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sector $sector)
    {
        $data = $sector->delete();
        return response()->json($data);
    }

    public function api()
    {
        return DataTables::of(Sector::query())
            ->editColumn('created_at', function ($sector) {
                return date('Y-m-d H:i:s', strtotime($sector->created_at));
            })
            ->make(true);
    }
}
