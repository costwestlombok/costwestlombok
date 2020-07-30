<?php

namespace App\Http\Controllers;

use App\Contact;
use DataTables;
use Illuminate\Http\Request;
use Session;

class ContactController extends Controller
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
        return view('metronic.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('metronic.contact.edit');
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
        Contact::create($data);
        Session::put('success', 'Data saved successfully!');
        return redirect('catalog/contact');
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
    public function edit(Contact $contact)
    {
        return view('metronic.contact.edit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $data = $request->all();
        $contact->update($data);
        Session::put('success', 'Data saved successfully!');
        return redirect('/catalog/contact');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector = Sector::find($id);
        $sector->delete();

        return redirect('/sector')->with('success', 'Sector has been destroyed');
    }

    public function api()
    {
        return DataTables::of(Contact::query())
            ->editColumn('created_at', function ($contact) {
                return date('Y-m-d H:i:s', strtotime($contact->created_at));
            })
            ->make(true);
    }
}
