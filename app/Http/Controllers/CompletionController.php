<?php

namespace App\Http\Controllers;

use App\Completion;
use Illuminate\Http\Request;

class CompletionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Completion  $completion
     * @return \Illuminate\Http\Response
     */
    public function show(Completion $completion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Completion  $completion
     * @return \Illuminate\Http\Response
     */
    public function edit(Completion $completion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Completion  $completion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Completion $completion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Completion  $completion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Completion $completion)
    {
        $contract = $completion->contract;
        $completion->delete();
        return redirect('award/' . $contract->award->id . '/contract');
    }
}
