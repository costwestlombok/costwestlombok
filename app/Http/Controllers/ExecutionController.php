<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Contract;
use App\Disbursment;
use App\Execution;
use App\Status;
use App\Warranty;
use App\WarrantyType;
use Illuminate\Http\Request;

class ExecutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $executions = Execution::all();
        return view('execution.index', compact('executions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contacts = Contact::all();
        $status = Status::all();
        $contracts = Contract::all();
        return view('execution.create', compact('contracts', 'status', 'contacts'));
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
        // return $data;
        $data['varprice'] = str_replace(",", "", $request->varprice);
        Execution::create($data);
        alert('Success', 'Data saved successfully!', 'success');

        return redirect('/execution');
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function disbursment($execution)
    {
        $data = Disbursment::where('executions_id', $execution)->get();
        $status = Status::all();
        return view('execution.disbursment', compact('data', 'execution', 'status'));
    }

    public function disbursment_store(Request $request)
    {
        $data = $request->all();
        // return $data;
        $data['amount'] = str_replace(",", "", $request->amount);
        Disbursment::create($data);
        alert('Success', 'Data saved successfully!', 'success');
        return back();
    }

    public function disbursment_destroy(Disbursment $disbursment)
    {
        $disbursment->delete();
        alert('Success', 'Data deleted successfully!', 'success');
        return back();
    }

    public function warranty($execution)
    {
        $data = Warranty::where('executions_id', $execution)->get();
        $warranty_types = WarrantyType::all();
        $status = Status::all();
        return view('execution.warranty', compact('data', 'warranty_types', 'status', 'execution'));
    }

    public function warranty_store(Request $request)
    {
        $data = $request->all();
        $data['ammount'] = str_replace(",", "", $request->ammount);
        Warranty::create($data);
        alert('Success', 'Data saved successfully!', 'success');
        return back();
    }
}
