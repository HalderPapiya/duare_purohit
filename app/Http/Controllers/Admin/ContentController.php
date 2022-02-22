<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\BaseController;

class ContentController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contents = Content::orderBy('id', 'DESC')->get();
        return view('admin.content.index', compact('contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.content.add');
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
            'about' => 'required',
            'terms_of_use' => 'required',
            'privacy' => 'required',
            'payment_policy' => 'required',
            'email' => 'required',
            'mobile' => 'required|digits:10|integer',
            'address' => 'required',
        ]);
        $content = new Content;
        $content->about = $request->input('about');
        $content->terms_of_use = $request->input('terms_of_use');
        $content->privacy = $request->input('privacy');
        $content->payment_policy = $request->input('payment_policy');
        $content->email = $request->input('email');
        $content->mobile = $request->input('mobile');
        $content->address = $request->input('address');
        $content->save();
        return $this->responseRedirect('admin.content.index', 'Content has been created successfully', 'success', false, false);
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
        $content = Content::find($id);
        return view('admin.content.edit', compact('content'));
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
            'about' => 'required',
            'terms_of_use' => 'required',
            'privacy' => 'required',
            'payment_policy' => 'required',
            'email' => 'required',
            'mobile' => 'required|digits:10|integer',
            'address' => 'required',
        ]);

        Content::where('id', $id)->update([
            'about' => $request->about,
            'terms_of_use' => $request->terms_of_use,
            'privacy' => $request->privacy,
            'payment_policy' => $request->payment_policy,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'address' => $request->address,
        ]);
        return $this->responseRedirect('admin.content.index', 'Content has been updated successfully', 'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Content::where('id', $id)->delete();
        return redirect()->route('admin.content.index');
    }

    public function updateStatus(Request $request)
    {

        $contentId = $request->id;

        Content::where('id', $contentId)->update([
            'status' => $request->status,
        ]);

        return response()->json(array('message' => 'Content status has been successfully updated'));
    }
}