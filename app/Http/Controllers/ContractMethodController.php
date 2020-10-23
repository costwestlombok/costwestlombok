<?php

namespace App\Http\Controllers;

use App\ContractMethod;
use DataTables;
use Illuminate\Http\Request;
use Session;

class ContractMethodController extends Controller
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
        return view('metronic.contract.method.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('metronic.contract.method.edit');
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
            'method_name' => 'required',
        ]);

        $method = new ContractMethod([
            'method_name' => $request->get('method_name'),
        ]);

        $method->save();
        Session::put("success", trans('labels.saved'));
        return redirect('/catalog/contract_method');
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
        $contract_method = ContractMethod::find($id);
        return view('metronic.contract.method.edit', compact('contract_method'));
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
        $this->validate($request, [
            'method_name' => 'required',
        ]);

        $method = ContractMethod::find($id);
        $method->method_name = $request->get('method_name');
        $method->save();
        Session::put("success", trans('labels.updated'));
        return redirect('/catalog/contract_method');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $method = ContractMethod::find($id);
        $data = $method->delete();
        return response()->json($data);
    }

    public function api()
    {
        return DataTables::of(ContractMethod::query())
            ->editColumn('created_at', function ($method) {
                return date('Y-m-d H:i:s', strtotime($method->created_at));
            })
            ->make(true);
    }

    public function get_data()
    {
        $data = ContractMethod::select('method_name')->get()->pluck('method_name');
        return response()->json($data);
    }
}
