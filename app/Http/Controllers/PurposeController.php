<?php

namespace App\Http\Controllers;

use App\Purpose;
use Illuminate\Http\Request;

class PurposeController extends Controller
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
        $purposes = Purpose::all();
        return view('purpose.index', ['purposes' => $purposes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('purpose.create');
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
            'purpose_name' => 'required',
        ]);

        $data = $request->all();
        Purpose::create($data);
        alert('Success', 'Data saved successfully!', 'success');

        return redirect('/purpose/create')->with('success', 'Record has been added');
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
        $purpose = Purpose::find($id);
        return view('purpose.edit', ['purpose' => $purpose]);
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
        $purpose = Purpose::find($id);
        $purpose->purpose_name = $request->get('purpose_name');
        $purpose->save();

        return redirect('/purpose')->with('success', 'Data has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $purpose = Purpose::find($id);
        $purpose->delete();

        return redirect('/purpose')->with('success', 'Sector has been destroyed');
    }
}
