<?php

namespace App\Http\Controllers;

use App\Banner;
use Illuminate\Http\Request;
use Storage;
use DataTables;
use Session;

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        if ($request->has('image')) {
            $data['image'] = $request->file('image')->store('banners');
        }
        Banner::create($data);
        Session::put("success", trans('labels.saved'));

        return redirect()->route('banner.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return view('metronic.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
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
        Session::put("success", trans('labels.updated'));

        return redirect()->route('banner.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
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
