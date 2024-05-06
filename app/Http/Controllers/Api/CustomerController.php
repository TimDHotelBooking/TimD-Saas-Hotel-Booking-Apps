<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function store(Request $request)
    {
        $ValidateData = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'address' => 'required',
        ]);

        if ($ValidateData->fails()) {
            $message = $ValidateData->errors();
            return response()->json(responseData(null, $message, false));
        } else {
            $customer = Customers::create([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'phone_number' => $request->phone_number,
                'company_name' => $request->company_name,
                'gst' => $request->gst,
                'address' => $request->address,
            ]);
            if($customer)
            {
                return response()->json(responseData($customer,'Customer added successfully'));
            }else{
                return response()->json(responseData(null,'Customer not added',false));
            }
            
        }
    }
}
