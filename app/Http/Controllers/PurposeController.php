<?php

namespace App\Http\Controllers;

use App\Purpose;
use DataTables;
use Illuminate\Http\Request;
use Session;

class PurposeController extends Controller
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
        return view('metronic.project.purpose.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('metronic.project.purpose.edit');
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
        Session::put("success", trans('labels.saved'));
        return redirect('/catalog/purpose');
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
    public function edit(Purpose $purpose)
    {
        return view('metronic.project.purpose.edit', compact('purpose'));
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

        Session::put("success", trans('labels.updated'));
        return redirect('/catalog/purpose');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purpose $purpose)
    {
        $data = $purpose->delete();
        return response()->json($data);
    }

    public function api()
    {
        return DataTables::of(Purpose::query())
            ->editColumn('created_at', function ($purpose) {
                return date('Y-m-d H:i:s', strtotime($purpose->created_at));
            })
            ->make(true);
    }
}
