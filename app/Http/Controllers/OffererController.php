<?php

namespace App\Http\Controllers;

use App\Offerer;
use Illuminate\Http\Request;

class OffererController extends Controller
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
        $rows = Offerer::all();
        return view('offerer.index', ['rows' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('offerer.create');
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
            'offerer_name' => 'required',
            'phone' => 'required',
        ]);

        $data = $request->all();
        Offerer::create($data);
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
        $offerer = Offerer::find($id);
        return view('offerer.edit', ['offerer' => $offerer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offerer $offerer)
    {
        $this->validate($request, [
            'offerer_name' => 'required',
            'phone' => 'required',
        ]);
        $data = $request->all();
        $offerer->update($data);
        alert('Success', 'Data updated successfully!', 'success');

        return redirect('/offerer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offerer $offerer)
    {
        $offerer->delete();
        alert('Success', 'Data deleted successfully!', 'success');

        return back();
    }
}
