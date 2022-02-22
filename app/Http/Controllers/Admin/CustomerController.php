<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class CustomerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = User::orderBy('id', 'DESC')->get();
        return view('admin.customer.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customer.add');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required|digits:10|integer',
            'password' => 'required',
            'address' => 'required',
            'landmark' => 'required',
            'city' => 'required',
            'pin' => 'required',
        ]);
        $customer = new User;
        $customer->fName = $request->input('first_name');
        $customer->lName = $request->input('last_name');
        $customer->email = $request->input('email');
        $customer->mobile = $request->input('mobile');
        $customer->password = $request->input('password');
        $customer->address = $request->input('address');
        $customer->landmark = $request->input('landmark');
        $customer->city = $request->input('city');
        $customer->pin = $request->input('pin');
        $customer->save();
        return $this->responseRedirect('admin.customer.index', 'Customer has been created successfully', 'success', false, false);
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
        $customer = User::find($id);
        return view('admin.customer.edit', compact('customer'));
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
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'mobile' => 'required|digits:10|integer',
            // 'password' => 'required',
            'address' => 'required',
            'landmark' => 'required',
            'city' => 'required',
            'pin' => 'required',
        ]);

        User::where('id', $id)->update([
            'fName' => $request->first_name,
            'lName' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            // 'password' => $request->password,
            'address' => $request->address,
            'landmark' => $request->address,
            'city' => $request->city,
            'pin' => $request->pin,
        ]);
        return $this->responseRedirect('admin.customer.index', 'Customer has been updated successfully', 'success', false, false);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect()->route('admin.customer.index');
    }

    public function updateStatus(Request $request)
    {


        $customerId = $request->id;

        User::where('id', $customerId)->update([
            'status' => $request->status,
        ]);

        return response()->json(array('message' => 'Customer status has been successfully updated'));
    }
}