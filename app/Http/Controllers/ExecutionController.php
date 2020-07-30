<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Contract;
use App\Disbursment;
use App\Execution;
use App\Status;
use App\Warranty;
use App\WarrantyType;
use DataTables;
use Illuminate\Http\Request;
use Session;

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
        $status = Status::where('status_name', $request->status_id)->first();

        if ($status) {
            $data['status_id'] = $status->id;
        } else {
            $tm = Status::create([
                'status_name' => $request->status_id,
            ]);
            $data['status_id'] = $tm->id;
        }
        Execution::create($data);
        Session::put('Success', 'Data saved successfully!', 'success');

        return redirect('contract-execution/' . $request->engage_id);
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

    public function disbursment(Execution $execution)
    {
        return view('metronic.execution.disbursment', compact('execution'));
    }

    public function disbursment_store(Request $request)
    {
        $data = $request->all();
        // return $data;
        $data['amount'] = str_replace(",", "", $request->amount);
        $status = Status::where('status_name', $request->status_id)->first();

        if ($status) {
            $data['status_id'] = $status->id;
        } else {
            $tm = Status::create([
                'status_name' => $request->status_id,
            ]);
            $data['status_id'] = $tm->id;
        }
        Disbursment::create($data);
        Session::put('success', 'Data saved successfully!');
        return redirect('contract-execution/' . $request->executions_id);
    }

    public function disbursment_destroy(Disbursment $disbursment)
    {
        $disbursment->delete();
        Session::put('success', 'Data deleted successfully!');
        return back();
    }

    public function warranty(Execution $execution)
    {
        return view('metronic.warranty.index', compact('execution'));
    }

    public function create_warranty(Execution $execution)
    {
        return view('metronic.warranty.edit', compact('execution'));
    }

    public function warranty_store(Request $request)
    {
        $data = $request->all();
        $data['ammount'] = str_replace(",", "", $request->ammount);
        $status = Status::where('status_name', $request->status_id)->first();

        if ($status) {
            $data['status_id'] = $status->id;
        } else {
            $tm = Status::create([
                'status_name' => $request->status_id,
            ]);
            $data['status_id'] = $tm->id;
        }

        $warranty_type = WarrantyType::where('name', $request->warranty_types_id)->first();

        if ($warranty_type) {
            $data['warranty_types_id'] = $warranty_type->id;
        } else {
            $wt = WarrantyType::create([
                'name' => $request->warranty_types_id,
            ]);
            $data['warranty_types_id'] = $wt->id;
        }
        Warranty::create($data);
        Session::put('success', 'Data saved successfully!');
        return redirect('warranty/' . $request->executions_id);
    }

    public function api($execution)
    {
        return DataTables::of(Disbursment::query()->where('executions_id', $execution))
            ->editColumn('created_at', function ($disbursment) {
                return date('Y-m-d H:i:s', strtotime($disbursment->created_at));
            })
            ->editColumn('date', function ($disbursment) {
                return date('D, d M Y', strtotime($disbursment->date));
            })
            ->editColumn('amount', function ($disbursment) {
                return number_format($disbursment->amount);
            })
            ->make(true);
    }

    public function execution(Execution $execution)
    {
        return view('metronic.execution.index', compact('execution'));
    }

    public function create_execution(Contract $contract)
    {
        return view('metronic.execution.edit', compact('contract'));
    }

    public function api_warranty($execution)
    {
        return DataTables::of(Warranty::query()->where('executions_id', $execution))
            ->editColumn('created_at', function ($warranty) {
                return date('Y-m-d H:i:s', strtotime($warranty->created_at));
            })
            ->editColumn('expiration_date', function ($warranty) {
                return date('D, d M Y', strtotime($warranty->expiration_date));
            })
            ->addColumn('type', function ($warranty) {
                return $warranty->type->name;
            })
            ->make(true);
    }

}
