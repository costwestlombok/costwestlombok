<?php

namespace App\Http\Controllers;

use App\Contact;
use App\Offerer;
use DataTables;
use Illuminate\Http\Request;
use Session;

class OffererController extends Controller
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
        return view('metronic.offerer.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('metronic.offerer.edit');
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
            'offerer_name' => 'required',
            // 'phone' => 'required',
        ]);

        $data = $request->all();
        $o = Offerer::create($data);
        if ($request->address && $request->phone) {
            $dc['name'] = $o->legal_name;
            $dc['address'] = $o->address;
            $dc['phone'] = $o->phone;
            $dc['position'] = "Offerer";
            $dc['email'] = " ";
            Contact::create($dc);
        }

        Session::put("success", trans('labels.saved'));
        return redirect()->route('offerer.index');
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
    public function edit(Offerer $offerer)
    {
        return view('metronic.offerer.edit', compact('offerer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offerer $offerer)
    {
        $this->validate($request, [
            'offerer_name' => 'required',
            'phone' => 'required',
        ]);
        $data = $request->all();
        $offerer->update($data);
        Session::put("success", trans('labels.updated'));
        return redirect()->route('offerer.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offerer $offerer)
    {
        $data = $offerer->delete();
        return response()->json($data);
    }

    public function api()
    {
        return DataTables::of(Offerer::query())
            ->editColumn('created_at', function ($offerer) {
                return date('Y-m-d H:i:s', strtotime($offerer->created_at));
            })
            ->addColumn('contract', function ($offerer) {
                return $offerer->contract->count();
            })
            ->orderColumn('contract', function ($query, $order) {
                $query->withCount('unit')
                    ->orderBy('contract', $order);
            })
            ->make(true);
    }
}
