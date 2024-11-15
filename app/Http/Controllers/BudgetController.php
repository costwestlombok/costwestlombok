<?php

namespace App\Http\Controllers;

use App\Models\Budget;
use App\Models\Project;
use App\Models\ProjectSource;
use App\Models\Source;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Session;

class BudgetController extends Controller
{
    public function index(Project $project)
    {
        $budgets = Budget::where('project_id', $project->id)->latest()->paginate(10);

        return view('metronic.budget.index', compact('budgets', 'project'));
    }

    public function create(Project $project)
    {
        return view('metronic.budget.edit', compact('project'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        // return $data;
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        $data['amount'] = str_replace(',', '', $request->amount);
        $data['duration'] = $start->diffInDays($end) + 1;

        Budget::create($data);
        Session::put('success', trans('labels.saved'));

        return redirect('project-budget/'.$request->project_id);
    }

    public function edit(Budget $budget)
    {
        $project = Project::where('id', $budget->project_id)->first();

        return view('metronic.budget.edit', compact('budget', 'project'));
    }

    public function update(Request $request, Budget $budget)
    {
        $data = $request->all();
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        $data['amount'] = str_replace(',', '', $request->amount);
        $data['duration'] = $start->diffInDays($end) + 1;

        $budget->update($data);
        Session::put('success', trans('labels.updated'));

        return redirect('project-budget/'.$request->project_id);
    }

    public function destroy(Budget $budget)
    {
        $budget->delete();
        Session::put('success', trans('labels.deleted'));

        return back();
    }

    public function source(Budget $budget)
    {
        return view('metronic.budget.source', compact('budget'));
    }

    public function store_project_source(Request $request)
    {
        $data = $request->all();
        $source = Source::where('source_name', $request->source_id)->first();
        if ($source) {
            $data['source_id'] = $source->id;
        } else {

            if (preg_match_all('/\b(\w)/', strtoupper($request->source_id), $m)) {
                $acronym = implode('', $m[1]);
            }

            $s = Source::create([
                'source_name' => $request->source_id,
                'acronym' => $acronym,
            ]);
            $data['source_id'] = $s->id;
        }
        $data['amount'] = str_replace(',', '', $request->amount);
        ProjectSource::create($data);
        Session::put('success', trans('labels.saved'));

        return back();
    }

    public function destroy_source(ProjectSource $project_source)
    {
        $project_source->delete();
        Session::put('success', trans('labels.deleted'));

        return back();
    }

    public function api()
    {
        return DataTables::of(ProjectSource::query())
            ->editColumn('created_at', function ($source) {
                return date('Y-m-d H:i:s', strtotime($source->created_at));
            })
            ->addColumn('source_name', function ($source) {
                return $source->source->source_name;
            })
            ->editColumn('amount', function ($source) {
                return number_format($source->amount);
            })
            ->make(true);
    }

    public function sourceApi(Budget $budget)
    {
        return DataTables::of(ProjectSource::where('budget_id', $budget->id))
            ->editColumn('created_at', function ($source) {
                return date('Y-m-d H:i:s', strtotime($source->created_at));
            })
            ->addColumn('source_name', function ($source) {
                return $source->source->source_name;
            })
            ->editColumn('amount', function ($source) {
                return number_format($source->amount);
            })
            ->make(true);
    }
}
