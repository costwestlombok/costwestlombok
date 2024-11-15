<?php

namespace App\Http\Controllers;

use App\Models\Role;
use DataTables;
use Illuminate\Http\Request;
use Session;

class RoleController extends Controller
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
        return view('metronic.role.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('metronic.role.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'role_name' => 'required',
        ]);
        $data = $request->all();
        Role::create($data);
        Session::put('success', trans('labels.saved'));

        return redirect('/catalog/role');
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
    public function edit(Role $role)
    {
        return view('metronic.role.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'role_name' => 'required',
        ]);
        $data = $request->all();
        $role->update($data);
        Session::put('success', trans('labels.updated'));

        return redirect('/catalog/role');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $data = $role->delete();

        return response()->json($data);
    }

    public function api()
    {
        return DataTables::of(Role::query())
            ->editColumn('created_at', function ($role) {
                return date('Y-m-d H:i:s', strtotime($role->created_at));
            })
            ->make(true);
    }

    public function get_data()
    {
        $data = Role::select('role_name')->get()->pluck('role_name');

        return response()->json($data);
    }
}
