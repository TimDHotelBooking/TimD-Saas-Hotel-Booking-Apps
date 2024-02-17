<?php

namespace App\Http\Controllers;

use App\Http\Requests\TariffRequest;
use App\Models\Rooms;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tariffs = Tariff::all();
        return view("tariff.edit",compact("tariffs"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rooms = Rooms::all();
        return view("tariff.create",compact("rooms"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TariffRequest $request)
    {
        try {
            $room_id = $request->input("room_id");
            $start_date = $request->input("start_date");
            $end_date = $request->input("end_date");
            $price = $request->input("price");
            $tariff = Tariff::create([
                "room_id" => $room_id,
                "start_date" => $start_date,
                "end_date" => $end_date,
                "price" => $price,
            ]);
            if ($tariff){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Tariff created successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create tariff"
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
    public function show(Tariff $tariff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tariff $tariff)
    {
        $rooms = Rooms::all();
        return view("tariff.edit",compact("tariff","rooms"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TariffRequest $request, Tariff $tariff)
    {
        try {
            $room_id = $request->input("room_id");
            $start_date = $request->input("start_date");
            $end_date = $request->input("end_date");
            $price = $request->input("price");
            $tariff = $tariff->update([
                "room_id" => $room_id,
                "start_date" => $start_date,
                "end_date" => $end_date,
                "price" => $price,
            ]);
            if ($tariff){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Tariff updated successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to update tariff"
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
    public function destroy(Tariff $tariff)
    {
        try {
            if ($tariff->delete()){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Tariff deleted successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to delete tariff"
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
