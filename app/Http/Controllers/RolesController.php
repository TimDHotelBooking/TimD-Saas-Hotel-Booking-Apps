<?php

namespace App\Http\Controllers;

use App\DataTables\UsersAssignedRoleDataTable;
use App\Http\Requests\RolesRequest;
use App\Models\Roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages/apps.roles.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("roles.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RolesRequest $request)
    {
        try {
            $role_name = $request->input("name");
            $role = Roles::create([
                "role_name" => $role_name,
                'created_by' => Auth::user()->user_id
            ]);
            if ($role){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Role created successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create role"
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
    public function show(Role $role,UsersAssignedRoleDataTable $dataTable)
    {
        return $dataTable->with('role', $role)
            ->render('pages/apps.roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Roles $roles)
    {
        $role = Roles::find($roles->id);
        return view("roles.edit",compact("role"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RolesRequest $request, Roles $roles)
    {
        try {
            $role_name = $request->input("name");
            $role = $roles->update([
                "role_name" => $role_name,
                'updated_by' => Auth::user()->user_id
            ]);
            if ($role){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Role updated successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to update role"
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
    public function destroy(Roles $roles)
    {
        try {
            if ($roles->delete()){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Role deleted successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to delete role"
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
