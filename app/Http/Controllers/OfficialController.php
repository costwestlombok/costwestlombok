<?php

namespace App\Http\Controllers;

use App\Official;
use DataTables;
use Illuminate\Http\Request;
use Session;

class OfficialController extends Controller
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
        return view('metronic.official.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('metronic.official.edit');
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
        Session::put("success", trans('labels.saved'));
        return redirect('/catalog/official');
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
    public function edit(Official $official)
    {
        return view('metronic.official.edit', compact('official'));
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
        Session::put("success", trans('labels.updated'));

        return redirect('/catalog/official');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Official $official)
    {
        $data = $official->delete();
        return response()->json($data);
    }

    public function get_official($unit)
    {
        $data = Official::where('entity_unit_id', $unit)->get();
        return response()->json($data);
    }

    public function api()
    {
        return DataTables::of(Official::query())
            ->editColumn('created_at', function ($official) {
                return date('Y-m-d H:i:s', strtotime($official->created_at));
            })
            ->addColumn('unit', function ($official) {
                return $official->unit->unit_name;
            })
            ->orderColumn('unit', function ($query, $order) {
                $query->withCount('unit')
                // sortBy(function ($organization) {
                //     return $organization->unit->count();
                // }, $order);
                    ->orderBy('unit', $order);
            })
            ->make(true);
    }
}
