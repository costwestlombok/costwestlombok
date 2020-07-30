<?php

namespace App\Http\Controllers;

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
        //
        $projects = Project::paginate(8);
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
        $config['center'] = "-8.6825504,116.1286378";
        $config['map_width'] = "100%";
        $config['map_height'] = "423px";
        $config['geocodeCaching'] = true;
        $config['zoomControlPosition'] = "BOTTOM_RIGHT"; //zoom control position
        $config['zoom'] = "14"; //zoom value
        $marker = array();
        $marker['position'] = '-8.6825504,116.1286378';
        $marker['draggable'] = true;
        $marker['ondragend'] = 'document.getElementById("initial_lat").value =event.latLng.lat()
                document.getElementById("initial_lon").value =event.latLng.lng();';
        $marker['icon'] = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
        $marker1 = array();
        $marker1['position'] = '-8.6825557,116.1308265';
        $marker1['draggable'] = true;
        $marker1['ondragend'] = 'document.getElementById("final_lat").value =event.latLng.lat()
                document.getElementById("final_lon").value =event.latLng.lng();';
        $marker1['icon'] = 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png';
        $map->add_marker($marker);
        $map->add_marker($marker1);
        $map->initialize($config);

        $map = $map->create_map();

        return view('metronic.project.edit', [
            'map' => $map,
        ]
        );
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
        return view('metronic.project.edit', compact('project'));
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
        $config['center'] = "-8.6825504,116.1286378";
        $config['map_width'] = "100%";
        $config['map_height'] = "423px";
        $config['geocodeCaching'] = true;
        $config['zoomControlPosition'] = "BOTTOM_RIGHT"; //zoom control position
        $config['zoom'] = "14"; //zoom value
        $marker = array();
        $marker['position'] = $project->initial_lat . ',' . $project->initial_lon;
        $marker['draggable'] = true;
        $marker['ondragend'] = 'document.getElementById("initial_lat").value =event.latLng.lat()
                document.getElementById("initial_lon").value =event.latLng.lng();';
        $marker['icon'] = 'http://maps.google.com/mapfiles/ms/icons/red-dot.png';
        $marker1 = array();
        $marker1['position'] = $project->final_lat . ',' . $project->final_lon;
        $marker1['draggable'] = true;
        $marker1['ondragend'] = 'document.getElementById("final_lat").value =event.latLng.lat()
                document.getElementById("final_lon").value =event.latLng.lng();';
        $marker1['icon'] = 'http://maps.google.com/mapfiles/ms/icons/blue-dot.png';
        $map->add_marker($marker);
        $map->add_marker($marker1);
        $map->initialize($config);

        $map = $map->create_map();

        return view('metronic.project.edit', [

            'map' => $map,
            'project' => $project,

        ]);
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
