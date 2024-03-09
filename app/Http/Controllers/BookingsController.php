<?php

namespace App\Http\Controllers;

use App\DataTables\BookingDataTable;
use App\Http\Requests\BookingsRequest;
use App\Models\Bookings;
use App\Models\Customers;
use App\Models\Property;
use App\Models\Rooms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BookingDataTable $dataTable)
    {
        return $dataTable->render('bookings.index',compact('dataTable'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $properties = Property::where('status', 1)
        ->get();
        return view('bookings.customer_booking',compact('properties'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BookingsRequest $request)
    {
        try {
            DB::beginTransaction();
            $first_name = $request->input("first_name");
            $last_name = $request->input("last_name");
            $email = $request->input("email");
            $phone_number = $request->input("phone_number");

            $customer = Customers::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'created_by' => Auth::user()->user_id,
                'updated_by' => Auth::user()->user_id,
                'status' => 1,
            ]);
            if (!empty($customer)){
                $customer_id = $customer->customer_id;
                $room_id = $request->input("room_id");
                $check_in_date = $request->input("check_in_date");
                $check_out_date = $request->input("check_out_date");
                $total_amount = $request->input("total_amount");
                $no_of_guests = $request->input("no_of_guests");
                $no_of_rooms = $request->input("no_of_rooms");
                $payment_method = $request->input("payment_method");
                $special_requests = $request->input("special_requests");
                $agent_id = Auth::user()->user_id;
                $booking = Bookings::create([
                    "customer_id" => $customer_id,
                    "room_id" => $room_id,
                    "check_in_date" => $check_in_date,
                    "check_out_date" => $check_out_date,
                    "total_amount" => $total_amount,
                    "no_of_guests" => $no_of_guests,
                    "no_of_rooms" => $no_of_rooms,
                    "payment_method" => $payment_method,
                    "special_requests" => $special_requests,
                    "agent_id" => $agent_id,
                    'created_by' => Auth::user()->user_id,
                    'updated_by' => Auth::user()->user_id,
                    'status' => 1
                ]);
                if ($booking){
                    DB::commit();
                    return response()->json([
                        "status" => 'success',
                        "msg" => "Booking created successfully"
                    ],200);
                }
            }
            DB::rollBack();
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create booking"
            ],500);
        }catch (\Exception $e){
            Log::info($e->getMessage());
            DB::rollBack();
            return response()->json([
                "status" => 'error',
                "msg" => "Something went wrong"
            ],500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bookings $booking)
    {
        $properties = Property::with(['rooms' => function($query){
            $query->has('tariffs')->where('status',Rooms::AVAILABLE_STATUS);
        }])->whereHas('agents',function ($query){
            $query->where('agent_id',Auth::user()->user_id);
        })->where('status',1)->get();
        return view('bookings.edit_customer_booking',compact('booking','properties'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bookings $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BookingsRequest $request, Bookings $booking)
    {
        try {
            DB::beginTransaction();
            $customer_id = $request->input("customer_id");
            $first_name = $request->input("first_name");
            $last_name = $request->input("last_name");
            $email = $request->input("email");
            $phone_number = $request->input("phone_number");

            $customer = Customers::where('customer_id',$customer_id)->update([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'created_by' => Auth::user()->user_id,
                'updated_by' => Auth::user()->user_id,
                'status' => 1,
            ]);
            if ($customer){
                $room_id = $request->input("room_id");
                $check_in_date = $request->input("check_in_date");
                $check_out_date = $request->input("check_out_date");
                $total_amount = $request->input("total_amount");
                $no_of_guests = $request->input("no_of_guests");
                $no_of_rooms = $request->input("no_of_rooms");
                $payment_method = $request->input("payment_method");
                $special_requests = $request->input("special_requests");
                $agent_id = Auth::user()->user_id;
                $booking = Bookings::where('booking_id',$booking->booking_id)->update([
                    "customer_id" => $customer_id,
                    "room_id" => $room_id,
                    "check_in_date" => $check_in_date,
                    "check_out_date" => $check_out_date,
                    "total_amount" => $total_amount,
                    "no_of_guests" => $no_of_guests,
                    "no_of_rooms" => $no_of_rooms,
                    "payment_method" => $payment_method,
                    "special_requests" => $special_requests,
                    "agent_id" => $agent_id,
                    'created_by' => Auth::user()->user_id,
                    'updated_by' => Auth::user()->user_id,
                    'status' => 1
                ]);
                if ($booking){
                    DB::commit();
                    return response()->json([
                        "status" => 'success',
                        "msg" => "Booking updated successfully"
                    ],200);
                }
            }
            DB::rollBack();
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to updated booking"
            ],500);
        }catch (\Exception $e){
            Log::info($e->getMessage());
            DB::rollBack();
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
