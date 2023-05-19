<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Payment;
use Illuminate\Http\Request;
use App\Models\PaymentConfirm;

class PaymentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payment = new Payment();
        $payment->payment_screenshot = $request->file('payment_screenshot')->getClientOriginalName();
        $payment->date = Carbon::now();
        $payment->payment_method_id = $request->payment_method;
        $payment->reservation_id = $request->reservation;
        $payment->save();
        $img = $request->file('payment_screenshot')->getClientOriginalName();
        $request->payment_screenshot->move(public_path('images'), $img);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $payment = Payment::where('reservation_id',$request->id)->first();
        $payment_confirm = PaymentConfirm::where('payment_id',$payment->id)->first();
        return view('staff.payment_view')->with('payment',$payment)->with('payment_confirm',$payment_confirm);
    }

}
