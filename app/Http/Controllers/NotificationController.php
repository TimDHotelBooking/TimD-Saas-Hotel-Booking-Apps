<?php

namespace App\Http\Controllers;

use App\Http\Requests\NotificationRequest;
use App\Models\Notification;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notifications = Notification::all();
        return view("notifications.index",compact("notifications"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = Users::all();
        return view("notifications.create",compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NotificationRequest $request)
    {
        try {
            $user_id = $request->input("user_id");
            $notification_type = $request->input("notification_type");
            $message = $request->input("message");
            $is_read = $request->input("is_read");
            $notification = Notification::create([
                "user_id" => $user_id,
                "notification_type" => $notification_type,
                "message" => $message,
                "is_read" => $is_read,
            ]);
            if ($notification){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Notification created successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create notification"
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
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        $users = Users::all();
        return view("notification.edit",compact("notification",'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NotificationRequest $request, Notification $notification)
    {
        try {
            $user_id = $request->input("user_id");
            $notification_type = $request->input("notification_type");
            $message = $request->input("message");
            $is_read = $request->input("is_read");
            $notification = $notification->update([
                "user_id" => $user_id,
                "notification_type" => $notification_type,
                "message" => $message,
                "is_read" => $is_read,
            ]);
            if ($notification){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Notification updated successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to update notification"
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
    public function destroy(Notification $notification)
    {
        try {
            if ($notification->delete()){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Notification deleted successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to delete notification"
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
