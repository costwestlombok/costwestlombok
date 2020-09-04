<?php

namespace App\Http\Controllers;

use App\Advance;
use App\Libraries\Googlemaps;
use App\Project;
use App\ProjectDocument;
use App\Role;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Session;
use Storage;

class ProjectController extends Controller
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
        if (request()->get('query')) {
            $projects = Project::where('project_title', 'like', '%'.request()->get('query').'%')->paginate(10);
        } else {
            $projects = Project::paginate(10);
        }
        return view('metronic.project.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $map = new Googlemaps();
        $map->add_marker([
            'position' => '-8.683070211544514,116.13077257514645',
            'draggable' => TRUE,
            'ondragend' => 'document.getElementById("initial_lat").value =event.latLng.lat(); document.getElementById("initial_lon").value = event.latLng.lng();',
            'icon' => 'http://maps.google.com/mapfiles/kml/paddle/A.png',
        ]);
        $map->add_marker([
            'position' => '-8.679305276105104,116.13759645742493',
            'draggable' => TRUE,
            'ondragend' => 'document.getElementById("final_lat").value =event.latLng.lat(); document.getElementById("final_lon").value = event.latLng.lng();',
            'icon' => 'http://maps.google.com/mapfiles/kml/paddle/B.png',
        ]);
        $map->initialize([
            'center' => "-8.683070211544514,116.13077257514645",
            'places' => TRUE
        ]);
        $map = $map->create_map();
        return view('metronic.project.edit', compact('map'));
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
        $start = Carbon::parse($request->start_date);
        $end = Carbon::parse($request->end_date);
        $data['duration'] = $start->diffInDays($end);
        $data['budget'] = str_replace(",", "", $request->budget);

        $role = Role::where('role_name', $request->role_id)->first();

        if ($role) {
            $data['role_id'] = $role->id;
        } else {
            $r = Role::create([
                'role_name' => $request->role_id,
            ]);
            $data['role_id'] = $r->id;
        }
        Project::create($data);
        Session::put("success", "Data saved successfully!");
        return redirect('/project');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $progress = Advance::where('project_id', $project->id)->orderBy('date_of_advance')->get();

        $pp = $progress->pluck('programmed_percent');
        $rp = $progress->pluck('real_percent');
        $date = $progress->map(function ($dt) {
            return date('d M Y', strtotime($dt->date_of_advance));
        });
        $sf = $progress->map(function ($dt) {
            return doubleval($dt->scheduled_financing);
        });
        $rf = $progress->map(function ($dt) {
            return doubleval($dt->real_financing);
        });
        $map = new Googlemaps();
        $map->add_marker([
            'position' => $project->initial_lat . ',' . $project->initial_lon,
            'icon' => 'http://maps.google.com/mapfiles/kml/paddle/A.png',
        ]);
        $map->add_marker([
            'position' => $project->final_lat . ',' . $project->final_lon,
            'icon' => 'http://maps.google.com/mapfiles/kml/paddle/B.png',
        ]);
        $map->initialize([
            'center' => $project->initial_lat . ',' . $project->initial_lon,
        ]);
        $map = $map->create_map();
        return view('metronic.project.show', compact('project', 'pp', 'rp', 'sf', 'rf', 'date', 'map'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        $map = new Googlemaps();
        $map->add_marker([
            'position' => $project->initial_lat . ',' . $project->initial_lon,
            'draggable' => TRUE,
            'ondragend' => 'document.getElementById("initial_lat").value =event.latLng.lat(); document.getElementById("initial_lon").value = event.latLng.lng();',
            'icon' => 'http://maps.google.com/mapfiles/kml/paddle/A.png',
        ]);
        $map->add_marker([
            'position' => $project->final_lat . ',' . $project->final_lon,
            'draggable' => TRUE,
            'ondragend' => 'document.getElementById("final_lat").value =event.latLng.lat(); document.getElementById("final_lon").value = event.latLng.lng();',
            'icon' => 'http://maps.google.com/mapfiles/kml/paddle/B.png',
        ]);
        $map->initialize([
            'center' => $project->initial_lat . ',' . $project->initial_lon,
            'places' => TRUE
        ]);
        $map = $map->create_map();
        return view('metronic.project.edit', compact('map', 'project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $data = $request->all();
        $data['budget'] = str_replace(",", "", $request->budget);
        $role = Role::where('role_name', $request->role_id)->first();

        if ($role) {
            $data['role_id'] = $role->id;
        } else {
            $r = Role::create([
                'role_name' => $request->role_id,
            ]);
            $data['role_id'] = $r->id;
        }
        $project->update($data);
        Session::put('success', 'Data updated successfully!');

        return redirect('/project');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        Session::put('success', 'Data deleted successfully!');
        return back();
    }

    public function project_file(Project $project)
    {
        return view('metronic.project.file', compact('project'));
    }

    public function store_file(Request $request)
    {
        $data = $request->except('file');
        $data['document_type'] = $request->file('file')->getClientOriginalExtension();
        $file = $request->file('file')->store('project_files');

        $data['document_path'] = $file;
        ProjectDocument::create($data);
        Session::put('success', 'Data saved successfully!');

        return back();
    }

    public function project_file_delete(ProjectDocument $projectdocument)
    {
        Storage::delete($projectdocument->document_path);
        $projectdocument->delete();
        Session::put('success', 'Data deleted successfully!');
        return back();
    }

    public function api()
    {
        return DataTables::of(ProjectDocument::query())
            ->editColumn('created_at', function ($organization) {
                return date('Y-m-d H:i:s', strtotime($organization->created_at));
            })
            ->make(true);
    }
}
