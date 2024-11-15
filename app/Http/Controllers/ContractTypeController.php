<?php

namespace App\Http\Controllers;

use App\Models\ContractType;
use DataTables;
use Illuminate\Http\Request;
use Session;

class ContractTypeController extends Controller
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
        return view('metronic.contract.type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('metronic.contract.type.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'type_name' => 'required',
        ]);

        $data = $request->all();
        ContractType::create($data);
        Session::put('success', trans('labels.saved'));

        return redirect('/catalog/contract_type');
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
        $contract_type = ContractType::find($id);

        return view('metronic.contract.type.edit', ['contract_type' => $contract_type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContractType $contract_type)
    {
        $this->validate($request, [
            'type_name' => 'required',
        ]);

        $data = $request->all();
        $contract_type->update($data);
        Session::put('success', trans('labels.updated'));

        return redirect('/catalog/contract_type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContractType $contract_type)
    {
        $data = $contract_type->delete();

        return response()->json($data);
    }

    public function api()
    {
        return DataTables::of(ContracTtype::query())
            ->editColumn('created_at', function ($contracttype) {
                return date('Y-m-d H:i:s', strtotime($contracttype->created_at));
            })
            ->make(true);
    }

    public function get_data()
    {
        $data = ContractType::select('type_name')->get()->pluck('type_name');

        return response()->json($data);
    }
}
