<?php

namespace App\Http\Controllers;

use App\Advance;
use App\AdvanceImage;
use App\Project;
use App\Status;
use Carbon\Carbon;
use DataTables;
use Illuminate\Http\Request;
use Session;
use Storage;

class ProgressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $advances = Advance::orderBy('date_of_advance', 'DESC')->paginate(8);
        return view('metronic.progress.index', compact('advances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $projects = Project::all();
        $status = Status::all();
        return view('progress.create', compact('projects', 'status'));
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
        // return $data;
        if ($request->scheduled_financing) {
            $data['scheduled_financing'] = str_replace(",", "", $request->scheduled_financing);
        }
        if ($request->real_financing) {
            $data['real_financing'] = str_replace(",", "", $request->real_financing);
        }
        if ($request->guaranties_doc) {
            $data['guaranties_doc'] = $request->file('guaranties_doc')->store('advance');
        }
        if ($request->advance_doc) {
            $data['advance_doc'] = $request->file('advance_doc')->store('advance');
        }
        $status = Status::where('status_name', $request->status_id)->first();

        if ($status) {
            $data['status_id'] = $status->id;
        } else {
            $tm = Status::create([
                'status_name' => $request->status_id,
            ]);
            $data['status_id'] = $tm->id;
        }

        Advance::create($data);
        Session::put('success', 'Data saved successfully!');
        return redirect('project-progress/' . $request->project_id);
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function images(Advance $advance)
    {
        return view('metronic.progress.images', compact('advance'));
    }

    public function images_store(Request $request, $advance)
    {
        // return $request->all();

        $image = $request->file('file');
        $imageName = time() . $image->getClientOriginalName();
        $upload_success = $request->file('file')->store('advance_images');
        // $image->move(local('images'), $imageName);
        $data['date_of_publication'] = Carbon::now();
        $data['advance_id'] = $advance;
        $data['path'] = $upload_success;
        $data['image'] = $image->getClientOriginalName();
        AdvanceImage::create($data);
        if ($upload_success) {
            return response()->json($upload_success, 200);
        }
        // Else, return error 400
        else {
            return response()->json('error', 400);
        }
    }

    public function image_destroy(AdvanceImage $advance_image)
    {
        // return $advance_image;
        Storage::delete($advance_image->path);
        $advance_image->delete();
        Session::put('success', 'Data deleted successfully!');

        return back();
    }

    public function progress(Project $project)
    {
        $advances = Advance::orderBy('date_of_advance', 'DESC')->paginate(8);
        return view('metronic.progress.index', compact('advances', 'project'));
    }

    public function create_progress(Project $project)
    {
        return view('metronic.progress.edit', compact('project'));
    }

    public function api()
    {
        return DataTables::of(AdvanceImage::query())
            ->editColumn('created_at', function ($ai) {
                return date('Y-m-d H:i:s', strtotime($ai->created_at));
            })
            ->make(true);
    }
}
