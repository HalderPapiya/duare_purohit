<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use App\Models\Puja;
use App\Models\Booking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FrontController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function caegoryList()
    {
        $categories = Category::where('status', '=', 1)->get();

        return response()->json([
            "status" => 200,
            "data" => $categories,
            "message" => "Category List",
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pujaList()
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

    // ---------------booking-----------

    /**
     * Register a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function booking(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pujaId' => 'required',
            'userId' => 'required',
            'amount' => 'required',
            'advance_amount' => 'required',
            'after_service' => 'required',
            'date' => 'required',
            'time' => 'required',
            'address' => 'required',
            'city' => 'required',
            'landmark' => 'required',
            'pin' => 'required',
        ]);
        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }
        $uniqueId = 'DP-' . mt_rand();
        $userId = $request->userId;
        $pujaId = $request->pujaId;
        $amount   = $request->amount;
        $advance_amount    = $request->advance_amount;
        $after_service = $request->after_service;
        $date = $request->date;
        $time = $request->time;
        $address = $request->address;
        $city = $request->city;
        $landmark = $request->landmark;
        $pin = $request->pin;
        $booking     = booking::create([
            'uniqueId' => $uniqueId,
            'pujaId' => $pujaId,
            'userId' => $userId,
            'amount' => $amount,
            'advance_amount' => $advance_amount,
            'after_service' => $after_service,
            'date' => $date,
            'time' => $time,
            'address' => $address,
            'landmark' => $landmark,
            'city' => $city,
            'pin' => $pin,

        ]);
        return response()->json([
            "status" => 200,
            "data" => $booking,
            "message" => "Booking Succesfull",
        ]);
    }
}