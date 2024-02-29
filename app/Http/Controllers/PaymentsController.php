<?php

namespace App\Http\Controllers;

use App\DataTables\PaymentsDataTable;
use App\Http\Requests\PaymentsRequest;
use App\Models\Bookings;
use App\Models\Payments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PaymentsDataTable $dataTable)
    {
        return $dataTable->render('payments.index',compact('dataTable'));
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
    public function store(PaymentsRequest $request)
    {
        try {
            $booking_id = $request->input("booking_id");
            $amount_paid = $request->input("amount_paid");
            $payment_date = $request->input("payment_date");
            $payment_method = $request->input("payment_method");
            $transaction_reference = $request->input("transaction_reference");
            $payment = Payments::create([
                "booking_id" => $booking_id,
                "amount_paid" => $amount_paid,
                "payment_date" => $payment_date,
                "payment_method" => $payment_method,
                "transaction_reference" => $transaction_reference,
                'created_by' => Auth::user()->user_id
            ]);
            if ($payment){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Payment created successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to create payment"
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
    public function show(Payments $payments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payments $payments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PaymentsRequest $request, Payments $payments)
    {
        try {
            $booking_id = $request->input("booking_id");
            $amount_paid = $request->input("amount_paid");
            $payment_date = $request->input("payment_date");
            $payment_method = $request->input("payment_method");
            $transaction_reference = $request->input("transaction_reference");
            $agent = $payments->update([
                "booking_id" => $booking_id,
                "amount_paid" => $amount_paid,
                "payment_date" => $payment_date,
                "payment_method" => $payment_method,
                "transaction_reference" => $transaction_reference,
                'updated_by' => Auth::user()->user_id
            ]);
            if ($agent){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Payment updated successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to update payment"
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
    public function destroy(Payments $payments)
    {
        try {
            if ($payments->delete()){
                return response()->json([
                    "status" => 'success',
                    "msg" => "Payments deleted successfully"
                ],200);
            }
            return response()->json([
                "status" => 'error',
                "msg" => "Something is wrong to delete payment"
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
