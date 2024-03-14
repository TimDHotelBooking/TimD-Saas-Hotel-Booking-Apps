<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\Customers;
use App\Models\Payments;
use App\Models\Property;
use App\Models\PropertyAgents;
use App\Models\Tariff;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $total_properties = $total_users = $total_property_admin =
        $total_property_agent = $no_of_bookings = $sum_of_bookings =
        $no_of_payments = $sum_of_payments = $no_of_tariff =
        $no_of_customers = null;
        if (Auth::user()->isSuperAdmin()) {
            $total_properties = Property::count();
            $total_users = Users::count();
            $total_property_admin = Users::role('Property Admin')->count();
            $total_property_agent = Users::role('Property Agent')->count();
            $no_of_bookings = Bookings::count();
            $sum_of_bookings = Bookings::sum('total_amount');
            $no_of_payments = Payments::count();
            $sum_of_payments = Payments::whereIn('status',[Payments::STATUS_FULLY_PAID,Payments::STATUS_PARTIALLY_PAID])->sum('amount_paid');
            $no_of_customers = Customers::count();
            $all_properties = [];
            $selected_property=0;

        }
        else if (Auth::user()->isPropertyAdmin()){
            $property_admin_id = Auth::user()->user_id;
            $total_property_agent = Users::where('created_by',$property_admin_id)->role('Property Agent')->count();
            $no_of_bookings = Bookings::whereHas('room',function ($query) use ($property_admin_id){
                $query->where('created_by',$property_admin_id);
            })->count();
            $sum_of_bookings = Bookings::whereHas('room',function ($query) use ($property_admin_id){
                $query->where('created_by',$property_admin_id);
            })->sum('total_amount');
            $no_of_payments = Payments::whereHas('booking.room',function ($query) use ($property_admin_id){
                $query->where('created_by',$property_admin_id);
            })->count();
            $sum_of_payments = Payments::whereHas('booking.room',function ($query) use ($property_admin_id){
                $query->where('created_by',$property_admin_id);
            })->whereIn('status',[Payments::STATUS_FULLY_PAID,Payments::STATUS_PARTIALLY_PAID])->sum('amount_paid');
            $no_of_tariff = Tariff::where('created_by',$property_admin_id)->count();

            $all_property_agents_id = PropertyAgents::whereHas('property',function ($query) use($property_admin_id){
                $query->where('property_admin_id',$property_admin_id);
            })->pluck('agent_id');
            $no_of_customers = Customers::whereIn('created_by',$all_property_agents_id)->count();
            $all_properties = Property::where('property_admin_id', $property_admin_id)->get();
            $selected_property=Auth::user()->property_id;
        }else if(Auth::user()->isPropertyAgent()){
            $property_agent_id = Auth::user()->user_id;
            $total_properties = Property::where('created_by',$property_agent_id)->count();
            $no_of_bookings = Bookings::count();
            $sum_of_bookings = Bookings::sum('total_amount');
            $no_of_payments = Payments::count();
            $sum_of_payments = Payments::whereIn('status',[Payments::STATUS_FULLY_PAID,Payments::STATUS_PARTIALLY_PAID])->sum('amount_paid');
            $no_of_customers = Customers::where('created_by',$property_agent_id)->count();
            $all_properties = [];
            $selected_property=0;
        }
        return view("dashboard.index",compact(
            'total_properties',
            'total_users',
            'total_property_admin',
            'total_property_agent',
            'no_of_bookings',
            'sum_of_bookings',
            'no_of_payments',
            'sum_of_payments',
            'no_of_tariff',
            'no_of_customers',
            'all_properties',
            'selected_property'
        ));
    } 

    public function change_property (Request $request)  {
        $user_id = Auth::user()->user_id;
        $property_id = $request->property_id;

        //echo "user_id=".$user_id." and property_id=".$property_id;
        $user = Users::where('user_id',$user_id)->first();
        $user->property_id = $property_id;
        $user->save();
       
        return redirect()->route('dashboard')->with('message', 'Successfully switched');


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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
