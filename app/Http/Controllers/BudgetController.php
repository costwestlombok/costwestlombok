<?php

namespace App\Http\Controllers;

use App\Budget;
use App\ProjectSource;
use App\Source;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index($project)
    {
        $data = Budget::where('project_id', $project)->get();
        return view('project.budget', compact('data', 'project'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // return $data;
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        $data['amount'] = str_replace(",", "", $request->amount);
        $data['duration'] = $start->diffInDays($end);

        Budget::create($data);
        alert('Success', 'Data saved successfully!', 'success');
        return back();
    }

    public function source($project, $budget)
    {
        $data = ProjectSource::where('project_id', $project)->where('budget_id', $budget)->get();
        $sources = Source::all();
        return view('project.source', compact('data', 'project', 'budget', 'sources'));
    }
}
