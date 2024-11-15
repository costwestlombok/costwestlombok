<?php

namespace App\Http\Controllers;

use App\Models\Status;
use DataTables;
use Illuminate\Http\Request;
use Session;

class StatusController extends Controller
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
        return view('metronic.status.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('metronic.status.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'status_name' => 'required',
        ]);

        $status = new Status([
            'status_name' => $request->get('status_name'),
        ]);

        $status->save();

        Session::put('success', trans('labels.saved'));

        return redirect('/catalog/status');
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
        $status = Status::find($id);

        return view('metronic.status.edit', ['status' => $status]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'status_name' => 'required',
        ]);

        $status = Status::find($id);
        $status->status_name = $request->get('status_name');
        $status->save();

        Session::put('success', trans('labels.updated'));

        return redirect('/catalog/status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $status = Status::find($id);
        $data = $status->delete();

        return response()->json($data);

    }

    public function api()
    {
        return DataTables::of(Status::query())
            ->editColumn('created_at', function ($status) {
                return date('Y-m-d H:i:s', strtotime($status->created_at));
            })
            ->make(true);
    }

    public function get_data()
    {
        $data = Status::select('status_name')->get()->pluck('status_name');

        return response()->json($data);
    }
}
