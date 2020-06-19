<?php

namespace App\Http\Controllers;

use App\Source;
use Illuminate\Http\Request;

class SourceController extends Controller
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
        $rows = Source::all();
        return view('source.index', ['rows' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('source.create');
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
        $obj = Source::find($id);
        return view('source.edit', ['obj' => $obj]);
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
        alert('Success', 'Data updated successfully!', 'success');

        return redirect('/source');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Source $source)
    {
        $source->delete();
        alert('Success', 'Data deleted successfully!', 'success');

        return back();
    }
}
