<?php

namespace App\Http\Controllers;

use App\DataTables\PropertyAgentsDataTable;
use App\Http\Requests\PropertyAgentsRequest;
use App\Models\PropertyAgents;

class PropertyAgentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PropertyAgentsDataTable $dataTable)
    {
       return $dataTable->render('property_agents.index');
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
    public function store(PropertyAgentsRequest $request)
    {
       //
    }

    /**
     * Display the specified resource.
     */
    public function show(PropertyAgents $propertyAgents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PropertyAgents $propertyAgents)
    {
       //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PropertyAgentsRequest $request, PropertyAgents $propertyAgentss)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PropertyAgents $propertyAgents)
    {
        //
    }
}
