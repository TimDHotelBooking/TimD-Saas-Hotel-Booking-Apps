<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingsRequest;
use App\Models\Agents;
use App\Models\Bookings;
use App\Models\Rooms;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bookings = Bookings::all();
        return view("bookings.index",compact("bookings"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Rooms::all();
        $agents = Agents::all();
        return view("bookings.create",compact('rooms','agents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingsRequest $request)
    {
        try {
            $customer_id = $request->input("customer_id");
            $room_id = $request->input("room_id");
            $check_in_date = $request->input("check_in_date");
            $check_out_date = $request->input("check_out_date");
            $total_amount = $request->input("total_amount");
            $agent_id = $request->input("agent_id");
            $booking = Bookings::create([
                "customer_id" => $customer_id,
                "room_id" => $room_id,
                "check_in_date" => $check_in_date,
                "check_out_date" => $check_out_date,
                "total_amount" => $total_amount,
                "agent_id" => $agent_id,
            ]);
            if ($booking){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Booking created successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create booking"
            ],500);
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->json([
                "status" => 'error',
                "msg" => "Something went wrong"
            ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bookings $bookings)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bookings $booking)
    {
        $rooms = Rooms::all();
        $agents = Agents::all();
        return view("bookings.edit",compact("booking","rooms","agents"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingsRequest $request, Bookings $bookings)
    {
        try {
            $customer_id = $request->input("customer_id");
            $room_id = $request->input("room_id");
            $check_in_date = $request->input("check_in_date");
            $check_out_date = $request->input("check_out_date");
            $total_amount = $request->input("total_amount");
            $agent_id = $request->input("agent_id");
            $booking = $bookings->update([
                "customer_id" => $customer_id,
                "room_id" => $room_id,
                "check_in_date" => $check_in_date,
                "check_out_date" => $check_out_date,
                "total_amount" => $total_amount,
                "agent_id" => $agent_id,
            ]);
            if ($booking){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Booking updated successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to update booking"
            ],500);
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->json([
                "status" => 'error',
                "msg" => "Something went wrong"
            ],500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookings $bookings)
    {
        try {
            if ($bookings->delete()){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Bookings deleted successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to delete booking"
            ],500);
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->json([
                "status" => 'error',
                "msg" => "Something went wrong"
            ],500);
        }
    }
}
