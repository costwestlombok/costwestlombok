<?php

namespace App\Http\Controllers;

use App\WarrantyType;
use Illuminate\Http\Request;

class WarrantyTypeController extends Controller
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
        $warranty_types = WarrantyType::all();
        return view('warranty_type.index', ['warranty_types' => $warranty_types]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('warranty_type.create');
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
            'name' => 'required',
        ]);

        $warranty_type = new WarrantyType([
            'name' => $request->get('name'),
        ]);

        $warranty_type->save();
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
        $warranty_type = WarrantyType::find($id);
        return view('warranty_type.edit', ['warranty_type' => $warranty_type]);
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
            'name' => 'required',
        ]);

        $warranty_type = WarrantyType::find($id);
        $warranty_type->name = $request->get('name');
        $warranty_type->save();
        alert('Success', 'Data updated successfully!', 'success');

        return redirect('/warranty-type');
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
        $warranty_type->delete();
        alert('Success', 'Data deleted successfully!', 'success');

        return back();
    }
}
