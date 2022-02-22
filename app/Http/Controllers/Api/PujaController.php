<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Puja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

class PujaController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Puja::where('status', '=', 1)->get();

        return response()->json([
            "status" => 200,
            "data" => $categories,
            "message" => "Puja List",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function categoryWisePujaList($id)
    {
        $categories = Puja::where('categoryId', $id)->where('status', '=', 1)->get();

        return response()->json([
            "status" => 200,
            "data" => $categories,
            "message" => "Puja List",
        ]);
    }

    public function allCategoryWiseAllPujaList()
    {
        $categories = Category::with('puja')->where('status', '=', 1)->get();

        return response()->json([
            "status" => 200,
            "data" => $categories,
            "message" => "Puja List",
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function registerApi(Request $request)
    {
        return response()->json(["status" => 200]);
    }

    /**
     * Register a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Puja::where('id', $id)->with('services')->where('status', '=', 1)->get();

        return response()->json([
            "status" => 200,
            "data" => $categories,
            "message" => "Service List",
        ]);
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
}