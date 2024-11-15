<?php

namespace App\Http\Controllers;

use App\Models\TenderMethod;
use DataTables;
use Illuminate\Http\Request;
use Session;

class TenderMethodController extends Controller
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
        return view('metronic.tender.method.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('metronic.tender.method.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'method_name' => 'required',
        ]);

        TenderMethod::create($request->all());

        Session::put('success', trans('labels.saved'));

        return redirect('/catalog/tender_method');
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
    public function edit(TenderMethod $tender_method)
    {
        return view('metronic.tender.method.edit', compact('tender_method'));
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
            'method_name' => 'required',
        ]);

        $method = TenderMethod::find($id);
        $method->method_name = $request->get('method_name');
        $method->save();
        Session::put('success', trans('labels.updated'));

        return redirect('/catalog/tender_method');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $method = TenderMethod::find($id);
        $data = $method->delete();

        return response()->json($data);
    }

    public function api()
    {
        return DataTables::of(TenderMethod::query())
            ->editColumn('created_at', function ($tender_method) {
                return date('Y-m-d H:i:s', strtotime($tender_method->created_at));
            })
            ->make(true);
    }

    public function get_data()
    {
        $data = TenderMethod::select('method_name')->get()->pluck('method_name');

        return response()->json($data);
    }
}
