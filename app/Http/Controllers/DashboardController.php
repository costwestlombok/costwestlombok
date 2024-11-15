<?php

namespace App\Http\Controllers;

use App\Models\Offerer;
use App\Models\Official;
use App\Models\Project;
use App\Models\Source;
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
            $project_sum = Project::count();
        } else {
            $projects = Project::whereIn('id', Auth::user()->agency->agencyProjects()->pluck('project_id'))->orderBy('created_at', 'DESC')->limit(4)->get();
            $project_sum = Project::whereIn('id', Auth::user()->agency->agencyProjects()->pluck('project_id'))->count();
        }
        $officials = Official::orderBy('created_at', 'DESC')->limit(5)->get();
        $official_sum = Official::count();
        $sources = Source::orderBy('created_at', 'DESC')->limit(5)->get();
        $source_sum = Source::count();
        $offerers = Offerer::orderBy('created_at', 'DESC')->limit(5)->get();
        $offerer_sum = Offerer::count();

        return view('metronic.index', compact('projects', 'officials', 'sources', 'offerers', 'project_sum', 'source_sum', 'offerer_sum'));
    }
}
