<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use DataTables;
use Illuminate\Http\Request;
use Session;
use Storage;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('metronic.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('metronic.banner.edit');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $data['image'] = $request->file('image')->store('banners');
        }
        Banner::create($data);
        Session::put('success', trans('labels.saved'));

        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('metronic.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $data = $request->all();
        if ($request->has('image')) {
            Storage::delete($banner->image);
            $data['image'] = $request->file('image')->store('banners');
        }
        $banner->update($data);
        Session::put('success', trans('labels.updated'));

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        Storage::delete($banner->image);
        $banner->delete();

        return redirect()->route('banner.index');
    }

    public function api()
    {
        return DataTables::of(Banner::query())
            ->editColumn('created_at', function ($banner) {
                return date('Y-m-d H:i:s', strtotime($banner->created_at));
            })
            ->make(true);
    }
}
