<?php

namespace App\Http\Controllers;

use App\Award;
use App\Offerer;
use App\Tender;
use App\TenderOfferer;
use DataTables;
use Illuminate\Http\Request;
use Session;

class TenderOffererController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tender $tender)
    {
        $tender_offerers = TenderOfferer::where('tender_id', $tender->id)->get();
        if (count($tender_offerers) > 0) {
            $data_offerers = $tender_offerers->map(function ($dt) {
                return $dt->offerer_id;
            });
            $offerers = Offerer::whereNotIn('id', $data_offerers)->get();
        } else {
            $offerers = Offerer::all();
        }
        return view('metronic.tender.offerer', compact('offerers', 'tender', 'tender_offerers'));
        // return view('metronic.tender.offerer', compact('tender_id'));
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
        // return $data;
        TenderOfferer::create($data);
        Session::put('success', 'Data saved successfully!');
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
        Session::put('success', 'Data deleted successfully!');
        return back();
    }

    public function get_sup(Award $award)
    {
        $supplier = TenderOfferer::with('offerer')->where('tender_id', $award->tender->id)->get();
        return response()->json($supplier);
    }

    public function api()
    {
        return DataTables::of(TenderOfferer::query())
            ->editColumn('created_at', function ($to) {
                return date('Y-m-d H:i:s', strtotime($to->created_at));
            })
            ->addColumn('offerer', function ($to) {
                return $to->offerer->offerer_name;
            })
            ->addColumn('contract', function ($to) {
                return $to->offerer->contract->count();
            })
            ->orderColumn('contract', function ($query, $order) {
                $query->withCount('contract')
                // sortBy(function ($organization) {
                //     return $organization->to->count();
                // }, $order);
                    ->orderBy('contract', $order);
            })
            ->make(true);
    }
}
