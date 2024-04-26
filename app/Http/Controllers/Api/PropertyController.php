<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bookings;
use App\Models\Property;
use App\Models\RoomList;
use App\Models\Rooms;
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
        $bookings = Bookings::where('agent_id', $request->agent_id)
        ->where('check_in_date', $request->check_in_date)
        ->where('check_out_date', $request->check_out_date)
        ->get();

    $roomIds = $bookings->pluck('room_id')->toArray();
    $roomTypeIds = $bookings->pluck('room_type_id')->toArray();
    $roomListIds = $bookings->pluck('room_list_id')->toArray();

    $rooms = RoomList::where('property_id', $request->property_id)
        ->where('room_id', $roomIds)
        ->where('room_type_id', $roomTypeIds)
        ->whereNotIn('room_list_id', $roomListIds)
        ->get();

    return response()->json(responseData($rooms, "all data retrive"));
    }

    public function roomtype()
    {
    }
}
