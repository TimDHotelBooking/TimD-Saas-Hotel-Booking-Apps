<?php

namespace App\Http\Controllers;

use App\DataTables\RoomsDataTable;
use App\Http\Requests\RoomsRequest;
use App\Models\Bookings;
use App\Models\Property;
use App\Models\Rooms;
use App\Models\RoomList;
use App\Models\Tariff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(RoomsDataTable $dataTable)
    {
        return $dataTable->render('rooms.index');
    }

    public function get_room_available(Request $request)
    {
        $no_of_rooms = $request->no_of_rooms;
        $check_in_date = $request->check_in_date;
        $check_out_date = $request->check_out_date;
        $room_type_id = $request->room_type_id;
        echo " no_of_rooms = " . $no_of_rooms . " check_in_date = " . $check_in_date . " check_out_date = " . $check_out_date . " room_type_id = " . $room_type_id;

        $all_rooms = RoomList::with(['tariffs' => function ($query) use ($check_in_date, $check_out_date) {
            $query->where('start_date', '<=', $check_in_date)->where('end_date', '>=', $check_out_date);
        }])->where('room_type_id', $room_type_id)->get();
        $all_available_date = [];
        if ($all_rooms->count() > 0) {
            foreach ($all_rooms as $all_rooms_indv) {
                if ($all_rooms_indv->tariffs) {
                    $all_available_date[] = array('room_type_id' => $room_type_id, 'room_list_id' => $all_rooms_indv->room_list_id, 'room_number' => $all_rooms_indv->room_number, 'floor' => $all_rooms_indv->floor, 'start_date' => $all_rooms_indv->tariffs->start_date, 'end_date' => $all_rooms_indv->tariffs->end_date);
                }
            }
        }
        $checkIn = Carbon::parse($check_in_date);
        $checkOut = Carbon::parse($check_out_date);
        $bookings = Bookings::where('room_type_id', $room_type_id)->whereBetween('check_in_date', [$checkIn, $checkOut])
            ->orWhereBetween('check_out_date', [$checkIn, $checkOut])
            ->orWhere(function ($query) use ($checkIn, $checkOut) {
                $query->where('check_in_date', '<=', $checkIn)
                    ->where('check_out_date', '>=', $checkOut);
            })
            ->get();
        $all_booking_date = [];
        if ($bookings->count() > 0) {
            foreach ($bookings as $bookings_indv) {

                $all_booking_date[] = array('room_type_id' => $bookings_indv->room_type_id, 'room_list_id' => $bookings_indv->room_list_id, 'room_number' => '', 'floor' => '', 'check_in_date' => $bookings_indv->check_in_date, 'check_out_date' => $bookings_indv->check_out_date);
            }
        }
        $tariffDates = $all_available_date;
        $bookedDates = $all_booking_date;
        $availableDates = [];

        foreach ($tariffDates as $tariff) {
            // Initialize array to hold non-overlapping available date ranges
            $nonOverlappingDates = [];

            // Check if any booked date overlaps with the tariff date
            if (!empty($bookedDates) && count($bookedDates) > 0){
                foreach ($bookedDates as $booking) {
                    // If there's an overlap, split the tariff date range
                    if (
                        ($tariff['start_date'] <= $booking['check_out_date'] && $tariff['end_date'] >= $booking['check_in_date']) ||
                        ($tariff['start_date'] >= $booking['check_in_date'] && $tariff['end_date'] <= $booking['check_out_date'])
                    ) {
                        // Split the tariff date range into two non-overlapping ranges
                        if ($tariff['start_date'] < $booking['check_in_date']) {
                            $end_date = Carbon::parse($booking['check_in_date'])->addDays(-1)->format("Y-m-d");
                            $nonOverlappingDates[] = ['start_date' => $tariff['start_date'], 'end_date' => $end_date];
                        }
                        if ($tariff['end_date'] > $booking['check_out_date']) {
                            $start_date = Carbon::parse($booking['check_out_date'])->addDays(1)->format("Y-m-d");
                            $nonOverlappingDates[] = ['start_date' => $start_date, 'end_date' => $tariff['end_date']];
                        }
                    } else {
                        // If there's no overlap, keep the tariff date range as is
                        $nonOverlappingDates[] = ['start_date' => $tariff['start_date'], 'end_date' => $tariff['end_date']];
                    }
                }
            }else{
                $nonOverlappingDates[] = ['start_date' => $tariff['start_date'], 'end_date' => $tariff['end_date']];
            }
            echo "<pre>";
            print_r($nonOverlappingDates);
            echo "</pre>";
            // Merge non-overlapping dates into the availableDates array
            $availableDates = array_merge($availableDates, $nonOverlappingDates);
        }

        echo "<pre>";
        //print_r($tariffDates);
        echo "<hr>";
       // print_r($bookedDates);
        echo "<hr>";
       // print_r($availableDates);
        echo "</pre>";
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties = Property::all();
        return view("rooms.create", compact("properties"));
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
            if ($room) {
                return response()->json([
                    "status" => 'success',
                    "msg" => "Room created successfully"
                ], 200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create room"
            ], 500);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                "status" => 'error',
                "msg" => "Something went wrong"
            ], 500);
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
        return view("rooms.edit", compact("room", "properties"));
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
            if ($room) {
                return response()->json([
                    "status" => 'success',
                    "msg" => "Room updated successfully"
                ], 200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to update room"
            ], 500);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                "status" => 'error',
                "msg" => "Something went wrong"
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rooms $rooms)
    {
        try {
            if ($rooms->delete()) {
                return response()->json([
                    "status" => 'success',
                    "msg" => "Room deleted successfully"
                ], 200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to delete Room"
            ], 500);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                "status" => 'error',
                "msg" => "Something went wrong"
            ], 500);
        }
    }


    public function get_room_tariffs($room_id)
    {
        try {
            if (!empty($room_id)) {
                $room = Rooms::with('type')->find($room_id);
                $availableDates = $room->availableDates();
                return response()->json([
                    'status' => 'success',
                    'msg' => 'Tariff data successfully fetched',
                    'data' => [
                        "availableDates" => $availableDates,
                        "room" => $room,
                    ],
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Incorrect data passed',
                ]);
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'status' => 'error',
                'msg' => 'Something went wrong',
            ]);
        }
    }
}
