<?php

namespace App\Http\Controllers;

use App\ContractMethod;
use Illuminate\Http\Request;

class ContractMethodController extends Controller
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
        $rows = ContractMethod::all();
        return view('contract_method.index', ['rows' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('contract_method.create');
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
        $method = ContractMethod::find($id);
        return view('contract_method.edit', ['method' => $method]);
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
        alert('Success', 'Data updated successfully!', 'success');

        return redirect('/contract_method');
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
        $method->delete();
        alert('Success', 'Data deleted successfully!', 'success');

        return back();
    }
}
