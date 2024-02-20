<?php

namespace App\Http\Controllers;

use App\DataTables\UsersDataTable;
use App\Http\Requests\UsersRequest;
use App\Models\Roles;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(UsersDataTable $dataTable)
    {
        return $dataTable->render('pages/apps.users.list');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UsersRequest $request)
    {
        try {
            $email = $request->input("email");
            $password = $request->input("password");
            $role_id = $request->input("role_id");
            $user = Users::create([
                "email" => $email,
                "password" => $password,
                "role_id" => $role_id,
                'created_by' => Auth::user()->user_id
            ]);
            if ($user){
                return response()->json([
                    "status" => 'success',
                    "msg" => "User created successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create user"
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
    public function show(Users $user)
    {
        return view('pages/apps.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Users $users)
    {
        $users = Users::with('role')->find($users->user_id);
        $roles = Roles::all();
        return view("roles.edit",compact("users","roles"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsersRequest $request, Users $users)
    {
        try {
            $email = $request->input("email");
            $password = $request->input("password");
            $role_id = $request->input("role_id");
            $user = $users->update([
                "email" => $email,
                "password" => $password,
                "role_id" => $role_id,
                'updated_by' => Auth::user()->user_id
            ]);
            if ($user){
                return response()->json([
                    "status" => 'success',
                    "msg" => "User updated successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to update user"
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
    public function destroy(Users $users)
    {
        try {
            if ($users->delete()){
                return response()->json([
                    "status" => 'success',
                    "msg" => "User deleted successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to delete user "
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
