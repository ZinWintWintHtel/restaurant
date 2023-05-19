<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\RestaurantDetail;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /* Welcome page view */
    public function index()
    {
        $id = Auth::user()->id;
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        $reservations = DB::table('reservations')->where('user_id',$id)->where('status','!=','completed')->get();
        return view('home')->with('reservations',$reservations)->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }

    /* user dashboard payment history view */
    public function paymentHistory(Request $request)
    {
        $payment = DB::table('payments')->where('reservation_id',$request->reservation_id)->first();
        $payment_method = DB::table('payment_methods')->where('id',$payment->payment_method_id)->first();
        $payment_confirm = DB::table('payment_confirms')->where('payment_id',$payment->id)->first();
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();

        if($payment == NULL)
        {
            dd("Null");
        }
        else
        {
            return view('payment_history')->with('payment',$payment)->with('payment_method',$payment_method)->with('payment_confirm',$payment_confirm)->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
        }
    }

    /* user dashboard payment screenshot view */
    public function viewPaymentScreenshot(Request $request){
        $payment= DB::table('payments')->where('id',$request->id)->first();
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        return view('view_payment_screenshot')->with('payment',$payment)->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }

    /* user dashboard feedback view - find feedback by login_user_id*/
    public function feedback(){
        $id = Auth::user()->id;
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        $customer_feedbacks = DB::table('customer_feedback')->where('user_id',$id)->get();
        return view('customer_feedback')->with('customer_feedbacks',$customer_feedbacks)->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }

}
