<?php

namespace App\Http\Controllers;

use App\Project;

class FrontController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('created_at', 'DESC')->limit(5)->get();
        return view('metronic.dashboard', compact('projects'));
    }
}
