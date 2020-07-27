<?php

namespace App\Http\Controllers;

use App\Sector;
use App\Subsector;
use DataTables;
use Illuminate\Http\Request;
use Session;

class SubsectorController extends Controller
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
        return view('metronic.subsector.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('metronic.subsector.edit');
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
            'sector_id' => 'required',
            'subsector_name' => 'required',
        ]);
        $data = $request->all();
        Subsector::create($data);
        Session::put("success", "Data saved successfully!");
        return redirect('/catalog/subsector');
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
    public function edit(Subsector $subsector)
    {
        return view('metronic.subsector.edit', compact('subsector'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subsector $subsector)
    {
        $this->validate($request, [
            'sector_id' => 'required',
            'subsector_name' => 'required',
        ]);
        $data = $request->all();
        $subsector->update($data);
        Session::put("success", "Data saved successfully!");
        return redirect('/catalog/subsector');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subsector $subsector)
    {
        $data = $subsector->delete();
        return response()->json($data);
    }

    /**
     * Show subsector un ajax request
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function ajax_get_subsector($id)
    {
        //$subsector = Subsector::find($sector);

        echo "something";
        return response()->json(['a' => 'A', 'name' => 'Carlos']);
    }

    public function get_subsector($sector)
    {
        $data = Subsector::where('sector_id', $sector)->get();
        return response()->json($data);
    }

    public function api()
    {
        return DataTables::of(Subsector::query())
            ->editColumn('created_at', function ($subsector) {
                return date('Y-m-d H:i:s', strtotime($subsector->created_at));
            })
            ->addColumn('sector', function ($subsector) {
                return $subsector->sector->sector_name;
            })
            ->orderColumn('sector', function ($query, $order) {
                $query->withCount('unit')
                    ->orderBy('sector', $order);
            })
            ->make(true);
    }

}
