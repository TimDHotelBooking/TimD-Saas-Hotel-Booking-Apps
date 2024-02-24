<?php

namespace App\Http\Controllers;

use App\DataTables\PropertyDataTable;
use App\Http\Requests\PropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PropertyDataTable $dataTable)
    {
        return $dataTable->render('property.index');
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
    public function store(PropertyRequest $request)
    {
        try {
            $property_name = $request->input("property_name");
            $location = $request->input("location");
            $contact_information = $request->input("contact_information");
            $property = Property::create([
                "property_name" => $property_name,
                "location" => $location,
                "contact_information" => $contact_information,
                'created_by' => Auth::user()->user_id
            ]);
            if ($property){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Property created successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create property"
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
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyRequest $request, Property $property)
    {
        try {
            $property_name = $request->input("property_name");
            $location = $request->input("location");
            $contact_information = $request->input("contact_information");
            $property = $property->update([
                "property_name" => $property_name,
                "location" => $location,
                "contact_information" => $contact_information,
                'updated_by' => Auth::user()->user_id
            ]);
            if ($property){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Property updated successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to update property"
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
    public function destroy(Property $property)
    {
        try {
            if ($property->delete()){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Property deleted successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to delete property"
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
