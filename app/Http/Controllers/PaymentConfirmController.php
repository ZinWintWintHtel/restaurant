<?php

namespace App\Http\Controllers;


use DateTime;
use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\PaymentConfirm;

class PaymentConfirmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $curTime = new DateTime();
        $confirm_date = $curTime->format("Y-m-d");
        $payment_confirm = new PaymentConfirm();
        $payment_confirm->is_confirm = $request->payment_confirm;
        $payment_confirm->confirm_date = $confirm_date;
        $payment_confirm->payment_id = $request->payment_id; 
        $payment_confirm->staff_id = $request->staff_id;
        $payment_confirm->save();
        $payment = Payment::find($request->payment_id);
        return view('staff.payment_confirm')->with('payment',$payment)->with('payment_confirm',$payment_confirm);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $payment = Payment::find($request->id);
        $payment_confirm = PaymentConfirm::where('payment_id',$payment->id)->first();
        return view('staff.payment_confirm')->with('payment',$payment)->with('payment_confirm',$payment_confirm);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentConfirm $paymentConfirm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentConfirm $paymentConfirm)
    {
        //
    }
}
