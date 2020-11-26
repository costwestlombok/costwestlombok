<?php

namespace App\Http\Controllers;

use App\Offerer;
use App\Official;
use App\Project;
use App\Source;
use Auth;

class DashboardController extends Controller
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
        if (Auth::guest()) {
            return redirect('/');
        }
        if (Auth::user()->type == 'admin') {
            $projects = Project::orderBy('created_at', 'DESC')->limit(4)->get();
        } else {
            $projects = Project::whereIn('id', Auth::user()->agency->agencyProjects()->pluck('project_id'))->orderBy('created_at', 'DESC')->limit(4)->get();
        }
        $officials = Official::orderBy('created_at', 'DESC')->limit(5)->get();
        $sources = Source::orderBy('created_at', 'DESC')->limit(5)->get();
        $offerers = Offerer::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('metronic.index', compact('projects', 'officials', 'sources', 'offerers'));
    }
}
