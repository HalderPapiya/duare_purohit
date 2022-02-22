<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class BannerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('id', 'DESC')->get();
        return view('admin.banner.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'title' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $banner = new Banner;
        $banner->title = $request->input('title');
        if ($request->hasFile('image')) {
            $fileName = uniqid() . '' . date('ymdhis') . '' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/banner/'), $fileName);
            $image = 'uploads/banner/' . $fileName;
        }
        $banner->image =  $image;
        $banner->save();
        return $this->responseRedirect('admin.banner.index', 'Banner has been created successfully', 'success', false, false);
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
        $banner = Banner::find($id);
        return view('admin.banner.edit', compact('banner'));
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
        $request->validate([
            'title' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->hasFile('image')) {

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/banner/'), $fileName);
            $image = 'uploads/banner/' . $fileName;
            Banner::where('id', $id)->update([
                'image' => $image,
            ]);
        }


        Banner::where('id', $id)->update([
            'title' => $request->title,
        ]);
        return $this->responseRedirect('admin.banner.index', 'Banner has been updated successfully', 'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Banner::where('id', $id)->delete();
        return redirect()->route('admin.banner.index');
    }

    public function updateStatus(Request $request)
    {

        $bannerId = $request->id;

        Banner::where('id', $bannerId)->update([
            'status' => $request->status,
        ]);

        return response()->json(array('message' => 'Banner status has been successfully updated'));
    }
}