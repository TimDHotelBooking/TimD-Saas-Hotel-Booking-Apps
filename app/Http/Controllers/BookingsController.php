<?php

namespace App\Http\Controllers;

use App\DataTables\BookingDataTable;
use App\Http\Requests\BookingsRequest;
use App\Models\Amenity;
use App\Models\Bookings;
use App\Models\CustomerProperty;
use App\Models\Customers;
use App\Models\Payments;
use App\Models\Property;
use App\Models\RoomList;
use App\Models\Rooms;
use App\Models\Tariff;
use App\Models\Type;
use App\Models\TypeAmenity;
use Carbon\Carbon;
use Nette\Utils\DateTime;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\PropertyAgents;
use Illuminate\Support\Facades\Mail;
use Throwable;
use App\Mail\BookingMail;

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

        // $properties = Property::with('rooms_list')->whereHas('agents', function ($query) {
        //     $query->where('agent_id', auth()->user()->user_id);
        // })
        //    ->where('status', 1)->get();
        $aminities = Amenity::get();
        return view('bookings.customer_booking', compact('aminities'));
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
            $cus_data = Customers::where('phone_number', $phone_number)->first();
            if (!$cus_data) {
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
                $id = auth()->user()->user_id;
                $propert_agent = PropertyAgents::where('agent_id', $id)->first();
                $cus_property = CustomerProperty::create([
                    'property_id' => $propert_agent->property_id,
                    'customer_id' => $customer->customer_id,
                ]);
            } else {
                $id = auth()->user()->user_id;
                $propert_agent = PropertyAgents::where('agent_id', $id)->first();
                $cus_property = CustomerProperty::where('customer_id', $cus_data->customer_id)->where('property_id',$propert_agent->property_id)->first();
                if(!$cus_property){
                    $cus_property = CustomerProperty::create([
                        'property_id' => $propert_agent->property_id,
                        'customer_id' => $cus_data->customer_id,
                    ]);
                }
            }


            if (!empty($customer)) {
                $customer_id = $cus_property->customer_id;
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
                    $customer = Customers::where('customer_id', $booking->customer_id)->first();
                    if($customer->email){
                        $this->bookingmail($customer);
                    }
                    return response()->json([
                        "status" => 'success',
                        "booking_id" => $booking->booking_id,
                        "msg" => "Booking created successfully"
                    ], 200);
                }
            }
            // DB::rollBack();
            // return response()->json([
            //     "status" => 'error',
            //     "msg" => "Something is wrong to create booking"
            // ], 500);
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            DB::rollBack();
            return response()->json([
                "status" => 'error',
                "msg" => $e->getMessage()
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
                    // $checkInDay = $checkInDate->dayOfWeek;
                    // $checkOutDay = $checkOutDate->dayOfWeek;

                    // $isSaturdaySunday = ($checkInDay === Carbon::SATURDAY && $checkOutDay === Carbon::SUNDAY);

                    // $room_rate = $isSaturdaySunday ? (float) $tariff->holiday_price : (float) $tariff->price;
                    // $ratePerNight = $isSaturdaySunday ? (float) $tariff->holiday_price : (float) $tariff->price;
                    $totalNights = $checkInDate->diffInDays($checkOutDate);

                    $resultDays = array(
                        'saturday' => 0,
                        'sunday' => 0
                    );

                    // change string to date time object
                    $startDate = new DateTime($check_in_date);
                    $endDate = new DateTime($check_out_date);

                    // iterate over start to end date
                    while ($startDate <= $endDate) {
                        // find the timestamp value of start date
                        $timestamp = strtotime($startDate->format('d-m-Y'));

                        // find out the day for timestamp and increase particular day
                        $weekDay = date('l', $timestamp);
                        $dt3 = strtolower($weekDay);

                        if (($dt3 == "saturday") || ($dt3 == "sunday")) {
                            $resultDays[$dt3] = $resultDays[$dt3] + 1;
                        }



                        // increase startDate by 1
                        $startDate->modify('+1 day');
                    }

                    $totalWeekends = $resultDays['saturday'] + $resultDays['sunday'];
                    if ($totalWeekends > 0) {
                        $totalAmount = ((($totalNights - $totalWeekends) * (float) $tariff->price) + ($totalWeekends * (float) $tariff->promotional_price)) * $no_of_rooms;
                    } else {
                        $totalAmount = ($totalNights * (float) $tariff->price) * $no_of_rooms;
                    }
                    //$totalAmount = $totalNights * $ratePerNight * $no_of_rooms;

                    return response()->json([
                        'status' => 'success',
                        'data' => [
                            'total_night' => $totalNights ?? 0,
                            'rate_per_night' => (float) $tariff->price,
                            'holiday_rate_per_night' => (float) $tariff->holiday_price,
                            'promotional_rate_per_night' => (float) $tariff->promotional_price,
                            'is_holiday_price' => $totalWeekends,
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

    public function room_type($prop_id, Request $request)
    {
        $amenityIds = $request->input('amenities');
        $properties = Property::with('rooms_list')->whereHas('agents', function ($query) {
            $query->where('agent_id', auth()->user()->user_id);
        })
            ->where('status', 1)->get();

        $propertyIds = $properties->pluck('property_id')->toArray();

        $data1 = TypeAmenity::whereIn('amenity_id', $amenityIds)->whereHas('type', function ($query) use ($propertyIds) {
            $query->where('property_id', $propertyIds);
        })->get();
        $typeIds = $data1->pluck('type_id')->toArray();
        $type = Type::with('property')->whereIn('type_id', $typeIds)->get();
        $data = RoomList::with('type', 'property', 'room')->where('property_id', $prop_id)->get();
        return view('bookings.typeroom', compact('data', 'type'));
    }

    public function propertyList(Request $request)
    {
        //return $request->all();
        $amenityIds = $request->input('amenities');
        $properties = Property::with('rooms_list')->whereHas('agents', function ($query) {
            $query->where('agent_id', auth()->user()->user_id);
        })
            ->where('status', 1)->get();

        $propertyIds = $properties->pluck('property_id')->toArray();

        $data = TypeAmenity::whereIn('amenity_id', $amenityIds)->whereHas('type', function ($query) use ($propertyIds) {
            $query->where('property_id', $propertyIds);
        })->get();

        if ($data->isNotEmpty()) {
            return view('bookings.property', compact('properties'));
        } else {
            $properties = null;
            return view('bookings.property', compact('properties'));
        }
    }

    public function bookingmail($customer)
    {
        try{
            $customer_detail = Customers::where('customer_id',$customer->customer_id)->first();
            $maildata = [
                'name' => $customer_detail->first_name,
            ];
            Mail::to($customer->email)->send(new BookingMail($maildata));
        } catch (Throwable $t){
            Log::error('Mail sending failed: ' . $t->getMessage());
            throw $t;
        }
    }
}
