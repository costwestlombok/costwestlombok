<?php

namespace App\Http\Controllers;

use App\Source;
use DataTables;
use Illuminate\Http\Request;
use Session;

class SourceController extends Controller
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
        return view('metronic.source.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('metronic.source.edit');
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
            'source_name' => 'required',
        ]);

        $data = $request->all();
        Source::create($data);
        Session::put("success", trans('labels.saved'));
        return redirect('/catalog/source');
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
    public function edit(Source $source)
    {
        return view('metronic.source.edit', compact('source'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Source $source)
    {
        //
        $this->validate($request, [
            'source_name' => 'required',
        ]);

        $data = $request->all();
        $source->update($data);
        Session::put("success", trans('labels.updated'));
        return redirect('/catalog/source');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        $data = $source->delete();
        return response()->json($data);
    }

    public function api()
    {
        return DataTables::of(Source::query())
            ->editColumn('created_at', function ($source) {
                return date('Y-m-d H:i:s', strtotime($source->created_at));
            })
            ->make(true);
    }

    public function get_data()
    {
        $data = Source::select('source_name')->get()->pluck('source_name');
        return response()->json($data);
    }
}
