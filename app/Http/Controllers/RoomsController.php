<?php

namespace App\Http\Controllers;

use App\DataTables\RoomsDataTable;
use App\Http\Requests\RoomsRequest;
use App\Models\Property;
use App\Models\Rooms;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RoomsDataTable $dataTable)
    {
        return $dataTable->render('rooms.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties = Property::all();
        return view("rooms.create",compact("properties"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RoomsRequest $request)
    {
        try {
            $property_id = $request->input("property_id");
            $room_type = $request->input("room_type");
            $availability_status = $request->input("availability_status");
            $price = $request->input("price");
            $room = Rooms::create([
                "property_id" => $property_id,
                "room_type" => $room_type,
                "availability_status" => $availability_status,
                "price" => $price,
                'created_by' => Auth::user()->user_id
            ]);
            if ($room){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Room created successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create room"
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
    public function show(Rooms $rooms)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rooms $room)
    {
        $properties = Property::all();
        return view("rooms.edit",compact("room","properties"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RoomsRequest $request, Rooms $rooms)
    {
        try {
            $property_id = $request->input("property_id");
            $room_type = $request->input("room_type");
            $availability_status = $request->input("availability_status");
            $price = $request->input("price");
            $room = $rooms->update([
                "property_id" => $property_id,
                "room_type" => $room_type,
                "availability_status" => $availability_status,
                "price" => $price,
                'updated_by' => Auth::user()->user_id
            ]);
            if ($room){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Room updated successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to update room"
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
    public function destroy(Rooms $rooms)
    {
        try {
            if ($rooms->delete()){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Room deleted successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to delete Room"
            ],500);
        }catch (\Exception $e){
            Log::info($e->getMessage());
            return response()->json([
                "status" => 'error',
                "msg" => "Something went wrong"
            ],500);
        }
    }


    public function get_room_tariffs($room_id){
        try {
            if (!empty($room_id)){
                $tariffs = Tariff::where('room_id',$room_id)->get()->toArray();
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Tariff data successfully fetched',
                    'data' => $tariffs
                ]);
            }else{
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Incorrect data passed',
                ]);
            }
        }catch (\Exception $e){
            return response()->json([
                'status' => 'error',
                'msg' => 'Something went wrong',
            ]);
        }
    }
}
