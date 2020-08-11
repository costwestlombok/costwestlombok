<?php

namespace App\Http\Controllers;

use App\Project;
use Auth;

class FrontController extends Controller
{
    public function index()
    {
        if(Auth::check()) {
            return redirect('home');
        }
        if (!request()->get('type') || request()->get('type') == 'road') {
            $projects = Project::orderBy('created_at', 'DESC')->limit(5)->get();
        } else {
            $projects = Project::whereNull('id')->get();
        }
        return view('metronic.dashboard', compact('projects'));
    }
}
