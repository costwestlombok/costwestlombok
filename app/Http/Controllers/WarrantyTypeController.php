<?php

namespace App\Http\Controllers;

use App\Models\WarrantyType;
use DataTables;
use Illuminate\Http\Request;
use Session;

class WarrantyTypeController extends Controller
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
        return view('metronic.warranty.type.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('metronic.warranty.type.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);

        $warranty_type = new WarrantyType([
            'name' => $request->get('name'),
        ]);

        $warranty_type->save();
        Session::put('success', trans('labels.saved'));

        return redirect('/catalog/warranty-type');
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
        $warranty_type = WarrantyType::find($id);

        return view('metronic.warranty.type.edit', ['warranty_type' => $warranty_type]);
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
            'name' => 'required',
        ]);

        $warranty_type = WarrantyType::find($id);
        $warranty_type->name = $request->get('name');
        $warranty_type->save();
        Session::put('success', trans('labels.updated'));

        return redirect('/catalog/warranty-type');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warranty_type = WarrantyType::find($id);
        $data = $warranty_type->delete();

        return response()->json($data);

    }

    public function api()
    {
        return DataTables::of(WarrantyType::query())
            ->editColumn('created_at', function ($warranty) {
                return date('Y-m-d H:i:s', strtotime($warranty->created_at));
            })
            ->make(true);
    }

    public function get_data()
    {
        $data = WarrantyType::select('name')->get()->pluck('name');

        return response()->json($data);
    }
}
