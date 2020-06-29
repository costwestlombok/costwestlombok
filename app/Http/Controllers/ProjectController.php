<?php

namespace App\Http\Controllers;

use App\Libraries\Googlemaps;
use App\Official;
use App\Organization;
use App\OrganizationUnit;
use App\Project;
use App\ProjectDocument;
use App\Purpose;
use App\Sector;
use App\Status;
use App\Subsector;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
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
        $obj = Project::all();
        return view('project.index', ['obj' => $obj]);
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

        $purposes = Purpose::all();

        $sectors = Sector::all();

        $organizations = Organization::all();

        $statuses = Status::all();

        return view('project.create', [
            'purposes' => $purposes,
            'sectors' => $sectors,
            'organizations' => $organizations,
            'statuses' => $statuses,
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

        Project::create($data);

        alert('Success', 'Data saved successfully!', 'success');

        return redirect('/project');
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
        return view('project.show');
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

        $purposes = Purpose::all();

        $sectors = Sector::all();
        $subsectors = Subsector::where('sector_id', $project->subsector->sector->id)->get();

        $organizations = Organization::all();
        $units = OrganizationUnit::where('entity_id', $project->official->unit->org->id)->get();
        $officials = Official::where('entity_unit_id', $project->official->unit->id)->get();

        $statuses = Status::all();

        return view('project.edit', [
            'purposes' => $purposes,
            'sectors' => $sectors,
            'organizations' => $organizations,
            'statuses' => $statuses,
            'map' => $map,
            'project' => $project,
            'subsectors' => $subsectors,
            'units' => $units,
            'officials' => $officials,
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
        $project->update($data);
        alert('Success', 'Data updated successfully!', 'success');

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
        alert('Success', 'Data deleted successfully!', 'success');
        return back();
    }

    public function project_file($project)
    {
        $data = ProjectDocument::where('project_id', $project)->get();
        return view('project.file', compact('data', 'project'));
    }

    public function store_file(Request $request)
    {
        $data = $request->except('file');
        $data['document_type'] = $request->file('file')->getClientOriginalExtension();
        $file = $request->file('file')->store('project_files');

        $data['document_path'] = $file;
        ProjectDocument::create($data);
        alert('Success', 'Data saved successfully!', 'success');

        return redirect('/project/file/' . $request->project_id);
    }

    public function project_file_delete(ProjectDocument $projectdocument)
    {
        Storage::delete($projectdocument->document_path);
        $projectdocument->delete();
        alert('Success', 'Data deleted successfully!', 'success');
        return back();
    }
}
