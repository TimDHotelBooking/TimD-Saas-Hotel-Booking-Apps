<?php

namespace App\Http\Controllers;

use App\DataTables\TariffDataTable;
use App\Http\Requests\TariffRequest;
use App\Models\Type;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TariffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TariffDataTable $dataTable)
    {
        return $dataTable->render( 'tariff.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
                'created_by' => Auth::user()->user_id
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
        //
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
                'updated_by' => Auth::user()->user_id
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

    public function checkCorrectTariffDate(Request $request){
        $room_id = $request->input("room_id");
        $checkInDate = $request->input("check_in_date");
        $checkOutDate = $request->input("check_out_date");

        if (!empty($room_id) && !empty($checkInDatee) && !empty($checkOutDate)){
            $tariff = Tariff::where('room_id', $room_id)
                ->where(function ($query) use ($checkInDate, $checkOutDate) {
                    $query->whereDate('start_date', '<=', $checkOutDate)
                        ->whereDate('end_date', '>=', $checkInDate);
                })
                ->orWhere(function ($query) use ($checkInDate, $checkOutDate) {
                    $query->whereDate('start_date', '=', $checkInDate)
                        ->whereDate('end_date', '=', $checkOutDate);
                })
                ->first();
            if (empty($tariff)){
                return response()->json([
                    "status" => 'error',
                    "msg" => "select correct check in date and check out date"
                ]);
            }
        }else{
            return response()->json([
                "status" => 'error',
                "msg" => "Something mismatch in check in date or check out date"
            ]);
        }
    }
}
