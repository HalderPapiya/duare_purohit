<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Puja;
use App\Models\PujaService;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class PujaServiceController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pujaServices = PujaService::orderBy('id', 'DESC')->get();
        return view('admin.puja-service.index', compact('pujaServices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pujas = Puja::get();
        return view('admin.puja-service.add', compact('pujas'));
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
            'pujaId' => 'required',
            'service_name' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $pujaService = new PujaService;
        $pujaService->pujaId = $request->input('pujaId');
        $pujaService->service_name = $request->input('service_name');
        $pujaService->price = $request->input('price');
        if ($request->hasFile('image')) {
            $fileName = uniqid() . '' . date('ymdhis') . '' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/puja-service/'), $fileName);
            $image = 'uploads/puja-service/' . $fileName;
        }
        $pujaService->image =  $image;
        $pujaService->save();
        return $this->responseRedirect('admin.puja-service.index', 'Puja Service has been created successfully', 'success', false, false);
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
        $pujas = Puja::get();
        $pujaService = PujaService::find($id);
        return view('admin.puja-service.edit', compact('pujaService', 'pujas'));
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
            'pujaId' => 'required',
            'service_name' => 'required',
            'price' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
        ]);

        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/puja-service/'), $fileName);
            $image = 'uploads/puja-service/' . $fileName;
            PujaService::where('id', $id)->update([
                'image' => $image,
            ]);
        }


        PujaService::where('id', $id)->update([
            'pujaId' => $request->pujaId,
            'service_name' => $request->service_name,
            'price' => $request->price,
        ]);
        return $this->responseRedirect('admin.puja-service.index', 'Puja Service has been updated successfully', 'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PujaService::where('id', $id)->delete();
        return redirect()->route('admin.puja-service.index');
    }

    public function updateStatus(Request $request)
    {

        $pujaServiceId = $request->id;

        PujaService::where('id', $pujaServiceId)->update([
            'status' => $request->status,
        ]);

        return response()->json(array('message' => 'Puja Service status has been successfully updated'));
    }
}