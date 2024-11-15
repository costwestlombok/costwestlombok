<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use Session;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agencies = Agency::latest()->get();

        return view('metronic.agency', compact('agencies'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Agency::create($request->all());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Agency $agency)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Agency $agency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agency $agency)
    {
        $agency->update($request->all());

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agency $agency)
    {
        $agency->user->delete();
        $agency->delete();

        return back();
    }

    public function user(Request $request, Agency $agency)
    {
        $r = $request->all();
        unset($r['_token']);
        if ($agency->user) {
            if ($request->password) {
                $r['password'] = bcrypt($r['password']);
            } else {
                unset($r['password']);
            }
            $agency->user()->update($r);
        } else {
            // check username
            $is_username_taken = \App\Models\User::where('username', $request->username)->exists();
            if ($is_username_taken) {
                Session::put('fail', __('labels.username_taken'));

                return back()->withInput();
            }
            $r['password'] = bcrypt($r['password']);
            $agency->user()->create($r);
        }

        return back();
    }
}
