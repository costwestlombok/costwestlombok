<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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

        $projects = DB::table('projects')->limit(10)->orderBy('id', 'desc')->get();

        return view('dashboard.index', ['projects' => $projects]);
    }
}
