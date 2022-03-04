<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;

class BookingController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $booking = Booking::where('status', 1)->get();

        if (is_null($booking)) {
            return $this->sendError('Booking Details not found.');
        } else {
            return response()->json([
                "data" => $booking,
                "status" => 200,
                "message" => "Booking List",
            ]);
        }
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


    /**
     * Register a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Booking(Request $request)
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
        $mobile = $request->mobile;
        $transaction_id = $request->transaction_id;
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
            'mobile' => $mobile,
            'transaction_id' => $transaction_id,

        ]);
        return response()->json([
            "status" => 200,
            "data" => $booking,
            "message" => "Booking Succesfull",
        ]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function userWiseBookingList($id)
    {
        $data = Booking::where('userId', $id)->with('pujaDetails')->where('status', '=', 1)->get();

        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => "Booking List",
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $userId)
    {
        $data = Booking::where('id', $id)->where('userId', $userId)->with('pujaDetails')->where('status', '=', 1)->get();

        return response()->json([
            "status" => 200,
            "data" => $data,
            "message" => "Booking Details",
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