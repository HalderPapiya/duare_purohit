<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\BaseController;

class CategoryController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.add');
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
            'name_in_bengali' => 'required|unique:categories,name_in_bengali',
            'name_in_english' => 'required|unique:categories,name_in_english',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $category = new Category;
        $category->name_in_bengali = $request->input('name_in_bengali');
        $category->name_in_english = $request->input('name_in_english');
        if ($request->hasFile('image')) {
            $fileName = uniqid() . '' . date('ymdhis') . '' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/category/'), $fileName);
            $image = 'uploads/category/' . $fileName;
        }
        $category->image =  $image;
        $category->save();
        return $this->responseRedirect('admin.category.index', 'Category has been created successfully', 'success', false, false);
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
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
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
            'name_in_bengali' => 'required',
            'name_in_english' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);
        if ($request->hasFile('image')) {

            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/category/'), $fileName);
            $image = 'uploads/category/' . $fileName;
            Category::where('id', $id)->update([
                'image' => $image,
            ]);
        }


        Category::where('id', $id)->update([
            'name_in_bengali' => $request->name_in_bengali,
            'name_in_english' => $request->name_in_english,
        ]);
        return $this->responseRedirect('admin.category.index', 'Category has been updated successfully', 'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::where('id', $id)->delete();
        return redirect()->route('admin.category.index');
    }

    public function updateStatus(Request $request)
    {

        $categoryId = $request->id;

        Category::where('id', $categoryId)->update([
            'status' => $request->status,
        ]);

        return response()->json(array('message' => 'Category status has been successfully updated'));
    }
}