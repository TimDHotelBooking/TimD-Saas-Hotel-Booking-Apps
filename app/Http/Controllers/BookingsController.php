<?php

namespace App\Http\Controllers;

use App\DataTables\BookingDataTable;
use App\Http\Requests\BookingsRequest;
use App\Models\Bookings;
use App\Models\Customers;
use App\Models\Payments;
use App\Models\Property;
use App\Models\RoomList;
use App\Models\Rooms;
use App\Models\Tariff;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use http\Env\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;


class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BookingDataTable $dataTable)
    {
        return $dataTable->render('bookings.index', compact('dataTable'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //DB::enableQueryLog();
        // $properties = Property::with(['rooms' => function ($query) {
        //     $query->has('tariffs')->where('availability_status', Rooms::AVAILABLE_STATUS);
        //    // $query->where('availability_status', Rooms::AVAILABLE_STATUS);
        // }])->whereHas('agents', function ($query) {
        //     $query->where('agent_id', Auth::user()->user_id);
        // })->where('status', 1)->get();
        // //print_r(DB::getQueryLog());
        // //die();
        // return view('bookings.customer_booking', compact('properties'));

        $properties = Property::with('rooms_list')->whereHas('agents', function ($query) {
            $query->where('agent_id', auth()->user()->user_id);
        })
            ->where('status', 1)->get();
        return view('bookings.customer_booking', compact('properties'));
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
            $company_name = $request->input("company_name");
            $gst = $request->input("gst");
            $address = $request->input("address");

            $customer = Customers::create([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'company_name' => $company_name,
                'gst' => $gst,
                'address' => $address,
                'created_by' => Auth::user()->user_id,
                'updated_by' => Auth::user()->user_id,
                'status' => 1,
            ]);
            if (!empty($customer)) {
                $customer_id = $customer->customer_id;
                $room_id = $request->input("room_id");
                $check_in_date = $request->input("check_in_date");
                $check_out_date = $request->input("check_out_date");
                $no_of_guests = $request->input("no_of_guests");
                $no_of_rooms = $request->input("no_of_rooms");
                $payment_method = $request->input("payment_method");
                $special_requests = $request->input("special_requests");

                $amount_paid = $request->input("amount_paid");
                $transaction_reference = $request->input("transaction_reference");

                $final_amount = $request->input("final_amount");
                $agent_id = Auth::user()->user_id;
                $booking = Bookings::create([
                    "customer_id" => $customer_id,
                    "room_id" => $room_id,
                    "check_in_date" => $check_in_date,
                    "check_out_date" => $check_out_date,
                    "total_amount" => $final_amount,
                    "no_of_guests" => $no_of_guests,
                    "no_of_rooms" => $no_of_rooms,
                    "payment_method" => $payment_method,
                    "special_requests" => $special_requests,
                    "agent_id" => $agent_id,
                    'created_by' => Auth::user()->user_id,
                    'updated_by' => Auth::user()->user_id,
                    'status' => 1
                ]);
                if ($booking) {

                    $total_nights = $request->input("total_nights");
                    $total_room = $request->input("total_room");
                    $price = $request->input("price");
                    $holiday_price = $request->input("holiday_price");
                    $is_holiday_price = $request->input("is_holiday_price");

                    $old_payment = Payments::where('booking_id', $booking->booking_id)->sum('amount_paid') ?? 0;
                    $total_pending_paid_amount = $final_amount - $old_payment;

                    $photo = '';


                    if ($request->file('ss')) {


                        $image = $request->file('ss');


                        $originName = $image->getClientOriginalName();
                        $fileName = pathinfo($originName, PATHINFO_FILENAME);
                        $fileName = preg_replace("/[^a-zA-Z0-9]+/", "", $fileName);

                        $extension = $image->getClientOriginalExtension();
                        $fileName = $fileName . '_' . time() . '.' . $extension;



                        if (in_array($extension, ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'])) {
                            if ($image->move(public_path() . '/image/booking/screen-shot/', $fileName)) {
                                $attachment_1 =  'image/booking/screen-shot/' . $fileName;

                                $photo = $attachment_1;
                            } else {
                                Session::flash('error', 'file  couldn\'t save, please try again later!');
                                return response()->json([
                                    'type' => 'error',
                                    'message' => 'file  couldn\'t save, please try again later!'
                                ]);
                            }
                        } else {
                            Session::flash('error', 'Only allow JPG,JPEG,PNG files');
                            return response()->json([
                                'type' => 'error',
                                'message' => 'Only allow JPG,JPEG,PNG files'
                            ]);
                        }
                    } else {
                    }


                    Payments::create([
                        'booking_id' => $booking->booking_id,
                        'amount_paid' => $amount_paid,
                        'photo' => $photo,
                        'payment_date' => Carbon::now(),
                        'payment_method' => $booking->payment_method ?? 'cash',
                        'transaction_reference' => $transaction_reference,
                        'status' => Payments::STATUS_NOT_PAID
                    ]);
                    DB::commit();
                    return response()->json([
                        "status" => 'success',
                        "booking_id" => $booking->booking_id,
                        "msg" => "Booking created successfully"
                    ], 200);
                }
            }
            DB::rollBack();
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create booking"
            ], 500);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();
            return response()->json([
                "status" => 'error',
                "msg" => "Something went wrong 111"
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Bookings $booking)
    {
        $properties = Property::with(['rooms' => function ($query) {
            $query->has('tariffs')->where('availability_status', Rooms::AVAILABLE_STATUS);
        }])->whereHas('agents', function ($query) {
            $query->where('agent_id', Auth::user()->user_id);
        })->where('status', 1)->get();
        return view('bookings.edit_customer_booking', compact('booking', 'properties'));
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
            $company_name = $request->input("company_name");
            $gst = $request->input("gst");
            $address = $request->input("address");

            $customer = Customers::where('customer_id', $customer_id)->update([
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone_number' => $phone_number,
                'company_name' => $company_name,
                'gst' => $gst,
                'address' => $address,
                'created_by' => Auth::user()->user_id,
                'updated_by' => Auth::user()->user_id,
                'status' => 1,
            ]);
            if ($customer) {
                $room_id = $request->input("room_id");
                $check_in_date = $request->input("check_in_date");
                $check_out_date = $request->input("check_out_date");
                $total_amount = $request->input("total_amount");
                $no_of_guests = $request->input("no_of_guests");
                $no_of_rooms = $request->input("no_of_rooms");
                $payment_method = $request->input("payment_method");
                $special_requests = $request->input("special_requests");

                $final_amount = $request->input("final_amount");
                $agent_id = Auth::user()->user_id;
                $updated_booking = Bookings::where('booking_id', $booking->booking_id)->update([
                    "customer_id" => $customer_id,
                    "room_id" => $room_id,
                    "check_in_date" => $check_in_date,
                    "check_out_date" => $check_out_date,
                    "total_amount" => $final_amount,
                    "no_of_guests" => $no_of_guests,
                    "no_of_rooms" => $no_of_rooms,
                    "payment_method" => $payment_method,
                    "special_requests" => $special_requests,
                    "agent_id" => $agent_id,
                    'created_by' => Auth::user()->user_id,
                    'updated_by' => Auth::user()->user_id,
                    'status' => 1
                ]);
                if ($updated_booking) {

                    $total_nights = $request->input("total_nights");
                    $total_room = $request->input("total_room");
                    $price = $request->input("price");
                    $holiday_price = $request->input("holiday_price");
                    $is_holiday_price = $request->input("is_holiday_price");

                    $old_payment = Payments::where('booking_id', $booking->booking_id)->sum('amount_paid') ?? 0;
                    $total_pending_paid_amount = $final_amount - $old_payment;
                    /* Payments::create([
                        'booking_id' => $booking->booking_id,
                        'amount_paid' => $total_pending_paid_amount,
                        'payment_date' => Carbon::now(),
                        'payment_method' => $booking->payment_method ?? 'cash',
                        'transaction_reference' => uniqid(),
                        'status' => Payments::STATUS_NOT_PAID
                    ]);*/
                    DB::commit();
                    return response()->json([
                        "status" => 'success',
                        "msg" => "Booking updated successfully"
                    ], 200);
                }
            }
            DB::rollBack();
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to updated booking"
            ], 500);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();
            return response()->json([
                "status" => 'error',
                "msg" => "Something went wrong 222"
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bookings $bookings)
    {
        try {
            if ($bookings->delete()) {
                return response()->json([
                    "status" => 'success',
                    "msg" => "Bookings deleted successfully"
                ], 200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to delete booking"
            ], 500);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                "status" => 'error',
                "msg" => "Something went wrong 333"
            ], 500);
        }
    }

    public function calculate_total_bill_amount(\Illuminate\Http\Request $request)
    {
        try {
            $room_id = $request->input("room_id");
            $check_in_date = $request->input("check_in_date");
            $check_out_date = $request->input("check_out_date");
            $no_of_rooms = $request->input("no_of_rooms");
            $room_type = RoomList::where('room_id', $request->room_id)->first();

            if (!empty($room_id) && !empty($check_in_date) && !empty($check_out_date)) {
                $checkInDate = Carbon::parse($check_in_date);
                $checkOutDate = Carbon::parse($check_out_date);

                $tariff = Tariff::where('room_type_id', $room_type->room_type_id)
                    ->where('property_id', $room_type->property_id)
                    ->first();

                if (!empty($tariff)) {
                    $checkInDay = $checkInDate->dayOfWeek;
                    $checkOutDay = $checkOutDate->dayOfWeek;

                    $isSaturdaySunday = ($checkInDay === Carbon::SATURDAY && $checkOutDay === Carbon::SUNDAY);

                    $room_rate = $isSaturdaySunday ? (float) $tariff->holiday_price : (float) $tariff->price;
                    $ratePerNight = $isSaturdaySunday ? (float) $tariff->holiday_price : (float) $tariff->price;
                    $totalNights = $checkInDate->diffInDays($checkOutDate);

                    $totalAmount = $totalNights * $ratePerNight * $no_of_rooms;

                    return response()->json([
                        'status' => 'success',
                        'data' => [
                            'total_night' => $totalNights ?? 0,
                            'rate_per_night' => $ratePerNight,
                            'holiday_rate_per_night' => (float) $tariff->holiday_price,
                            'promotional_rate_per_night' => (float) $tariff->promotional_price,
                            'is_holiday_price' => $isSaturdaySunday,
                            'total_rooms' => $no_of_rooms,
                            'total_amount' => $totalAmount
                        ]
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error1',
                        'msg' => 'No tariff found for the given dates'
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 'error',
                    'msg' => 'Invalid request parameters'
                ]);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return response()->json([
                'status' => 'error',
                'msg' => 'Something went wrong'
            ]);
        }
    }

    public function room_type($prop_id)
    {
        $type = Type::with('property')->where('property_id',$prop_id)->get();   
        $data = RoomList::with('type','property','room')->where('property_id',$prop_id)->get();
        return view ('bookings.typeroom',compact('data','type'));
    }
}
