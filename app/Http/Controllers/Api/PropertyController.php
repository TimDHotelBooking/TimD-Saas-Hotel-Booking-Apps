<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BookingDetail;
use App\Models\Bookings;
use App\Models\Property;
use App\Models\RoomList;
use App\Models\Rooms;
use Illuminate\Support\Facades\Validator;
use App\Models\Type;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Shared\OLE\PPS\Root;

class PropertyController extends Controller
{

    public function property()
    {
        $baseurl = request()->root();
        $datas = Property::where('status', 1)->get();
        $datas->transform(function ($data) use ($baseurl) {
            $data->photo = $baseurl . '/' . $data->photo;
            return $data;
        });
        return response()->json(responseData($datas, 'property retrived successfully'));
    }

    public function type(Request $request)
    {
        $data = Type::where('property_id', $request->property_id)->where('status', 1)->get();
        return response()->json(responseData($data, "All Type retrive Successfully"));
    }

    public function room(Request $request)
    {
        $data = Rooms::with('roomlist')->where('room_type_id', $request->room_type_id)->get();
        return response()->json(responseData($data, "All room with list retrive Successfully"));
    }

    public function avlroom(Request $request)
    {
        $bookings = Bookings::with('booking_detail')->where('agent_id', $request->agent_id)
            ->where('check_in_date', $request->check_in_date)
            ->where('check_out_date', $request->check_out_date)
            ->get();

        $roomIds = $bookings->pluck('room_id')->toArray();
        $roomTypeIds = [];
        $roomListIds = [];
        foreach ($bookings as $booking) {
            foreach ($booking->booking_detail as $detail) {
                $roomTypeIds[] = $detail->room_type_id;
                $roomListIds[] = $detail->room_list_id;
            }
        }
        $rooms = RoomList::where('property_id', $request->property_id)
            //->where('room_id', $roomIds)
            //->where('room_type_id', $roomTypeIds)
            ->whereNotIn('room_list_id', $roomListIds)
            ->get();

        return response()->json(responseData($rooms, "all data retrive"));
    }

    public function roomtype()
    {
    }

    public function booking(Request $request)
    {
        $ValidateData = Validator::make($request->all(), [
            'customer_id' => 'required',
            'room_id' => 'required',
            'check_in_date' => 'required',
            'check_out_date' => 'required',
            'no_of_guests' => 'required',
            'no_of_rooms' => 'required',
            'room_list_id' => 'array',
        ]);

        if ($ValidateData->fails()) {
            $message = $ValidateData->errors();
            return response()->json(responseData(null, $message, false));
        } else {
            $booking = Bookings::create([
                'customer_id' => $request->customer_id,
                'room_id' => $request->room_id,
                'agent_id' => $request->agent_id,
                'check_in_date' => $request->check_in_date,
                'check_out_date' => $request->check_out_date,
                'no_of_guests' => $request->no_of_guests,
                'no_of_rooms' => $request->no_of_rooms,
                'payment_method' => $request->payment_method,
                'created_by' => $request->agent_id,
                'updated_by' => $request->agent_id,
                'status' => 1,
            ]);

            if (count($request->room_list_id) > 0) {
                for ($i = 0; $i < count($request->room_list_id); $i++) {
                    BookingDetail::create([
                        'booking_id' => $booking->booking_id,
                        'property_id' => $request->property_id,
                        'room_list_id' => $request->room_list_id[$i],
                        'check_in_date' => $request->check_in_date,
                        'check_out_date' => $request->check_out_date,
                        'room_type_id' => $request->room_type_id,
                    ]);
                }
            }

            $data = Bookings::with('booking_detail')->where('booking_id' , $booking->booking_id)->first();
            return response()->json(responseData($data,"booking complete"));
        }
    }
}
