<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentsRequest;
use App\Models\Agents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agents = Agents::all();
        return view("agents.index",compact("agents"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("agents.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgentsRequest $request)
    {
        try {
            $first_name = $request->input("first_name");
            $last_name = $request->input("last_name");
            $email = $request->input("email");
            $phone_number = $request->input("phone_number");
            $property_id = $request->input("property_id");
            $agent = Agents::create([
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "phone_number" => $phone_number,
                "property_id" => $property_id,
            ]);
            if ($agent){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Agent created successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create agent"
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
    public function show(Agents $agents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Agents $agent)
    {
        return view("agents.edit",compact("agent"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgentsRequest $request, Agents $agents)
    {
        try {
            $first_name = $request->input("first_name");
            $last_name = $request->input("last_name");
            $email = $request->input("email");
            $phone_number = $request->input("phone_number");
            $property_id = $request->input("property_id");
            $agent = $agents->update([
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "phone_number" => $phone_number,
                "property_id" => $property_id,
            ]);
            if ($agent){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Agent updated successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to update agent"
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
    public function destroy(Agents $agent)
    {
        try {
            if ($agent->delete()){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Agent deleted successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to delete agent"
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
