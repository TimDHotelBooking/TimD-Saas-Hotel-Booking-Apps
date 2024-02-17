<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomersRequest;
use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customers::all();
        return view("customers.index",compact("customers"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("customers.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomersRequest $request)
    {
        try {
            $first_name = $request->input("first_name");
            $last_name = $request->input("last_name");
            $email = $request->input("email");
            $phone_number = $request->input("phone_number");
            $customer = Customers::create([
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "phone_number" => $phone_number,
            ]);
            if ($customer){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Customer created successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create customer"
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
    public function show(Customers $customers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customers $customer)
    {
        return view("customers.edit",compact("customer"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomersRequest $request, Customers $customer)
    {
        try {
            $first_name = $request->input("first_name");
            $last_name = $request->input("last_name");
            $email = $request->input("email");
            $phone_number = $request->input("phone_number");
            $customer = $customer->update([
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "phone_number" => $phone_number,
            ]);
            if ($customer){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Customer updated successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to update customer"
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
    public function destroy(Customers $customer)
    {
        try {
            if ($customer->delete()){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Customer deleted successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to delete customer"
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
