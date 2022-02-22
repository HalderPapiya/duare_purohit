<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Puja;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class PujaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pujas = Puja::orderBy('id', 'DESC')->get();
        return view('admin.puja.index', compact('pujas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.puja.add', compact('categories'));
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
            'category' => 'required',
            'name_in_bengali' => 'required|unique:categories,name_in_bengali',
            'name_in_english' => 'required|unique:categories,name_in_english',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $puja = new Puja;
        $puja->categoryId = $request->input('category');
        $puja->name_in_bengali = $request->input('name_in_bengali');
        $puja->name_in_english = $request->input('name_in_english');
        $puja->description = $request->input('description');
        if ($request->hasFile('image')) {
            $fileName = uniqid() . '' . date('ymdhis') . '' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/puja/'), $fileName);
            $image = 'uploads/puja/' . $fileName;
        }
        $puja->image =  $image;
        $puja->save();
        return $this->responseRedirect('admin.puja.index', 'Puja has been created successfully', 'success', false, false);
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
        $categories = Category::get();
        $puja = Puja::find($id);
        return view('admin.puja.edit', compact('puja', 'categories'));
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
        // dd($request->all());
        $request->validate([
            'category' => 'required',
            'name_in_bengali' => 'required',
            'name_in_english' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
        ]);
        if ($request->hasFile('image')) {

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/puja/'), $fileName);
            $image = 'uploads/puja/' . $fileName;
            Puja::where('id', $id)->update([
                'image' => $image,
            ]);
        }


        Puja::where('id', $id)->update([
            'categoryId' => $request->category,
            'name_in_bengali' => $request->name_in_bengali,
            'name_in_english' => $request->name_in_english,
            'description' => $request->description,
        ]);
        return $this->responseRedirect('admin.puja.index', 'Puja has been updated successfully', 'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Puja::where('id', $id)->delete();
        return redirect()->route('admin.puja.index');
    }

    public function updateStatus(Request $request)
    {

        $pujaId = $request->id;

        Puja::where('id', $pujaId)->update([
            'status' => $request->status,
        ]);

        return response()->json(array('message' => 'Puja status has been successfully updated'));
    }
}