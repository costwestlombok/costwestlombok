<?php

namespace App\Http\Controllers;

use App\TenderStatus;
use Illuminate\Http\Request;

class TenderStatusController extends Controller
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
        $tender_statuses = TenderStatus::all();
        return view('tender_status.index', compact('tender_statuses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tender_status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->validate($request, [
            'status_name' => 'required',
        ]);
        TenderStatus::create($data);
        Session::put('success', 'Data saved successfully!');

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
        $status = TenderStatus::find($id);
        return view('tender_status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TenderStatus $tenderStatus)
    {
        $this->validate($request, [
            'status_name' => 'required',
        ]);
        $data = $request->all();
        $tenderStatus->update($data);
        Session::put('success', 'Data updated successfully!');
        return redirect('/catalog/tender-status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TenderStatus $tenderStatus)
    {
        $tenderStatus->delete();
        Session::put('success', 'Data deleted successfully!');

        return back();
    }

    public function get_data()
    {
        $data = TenderStatus::select('status_name')->get()->pluck('status_name');
        return response()->json($data);
    }
}
