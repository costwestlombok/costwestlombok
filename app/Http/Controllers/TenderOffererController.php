<?php

namespace App\Http\Controllers;

use App\Award;
use App\Offerer;
use App\TenderOfferer;
use Illuminate\Http\Request;

class TenderOffererController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($tender_id)
    {
        $tender_offerers = TenderOfferer::where('tender_id', $tender_id)->get();
        if (count($tender_offerers) > 0) {
            $data_offerers = $tender_offerers->map(function ($dt) {
                return $dt->offerer_id;
            });
            $offerers = Offerer::whereNotIn('id', $data_offerers)->get();
        } else {
            $offerers = Offerer::all();
        }
        return view('tender.offerer', compact('offerers', 'tender_id', 'tender_offerers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        TenderOfferer::create($data);
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
        $to = TenderOfferer::find($id);
        $to->delete();
        alert('Data deleted successfully!', 'success');
        return back();
    }

    public function get_sup(Award $award)
    {
        $supplier = TenderOfferer::with('offerer')->where('tender_id', $award->tender->id)->get();
        return response()->json($supplier);
    }
}
