<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\CustomerFeedback;
use App\Models\RestaurantDetail;
use Illuminate\Support\Facades\DB;

class CustomerFeedbackController extends Controller
{

    /* User Dashboard Feedback Form view*/
    public function feedBackForm(){
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        return view('feedback_form')->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer_feedbacks = CustomerFeedback::select('id', 'rating', 'review','user_id','date')
        ->orderByDesc('date')
        ->paginate(2);
        return view('manager.view_customer_feedback')->with('customer_feedbacks',$customer_feedbacks);
    }

    /* monthly feedback report in manager dashboard */
    public function monthCustomerFeedback(Request $request)
    {
        $request->validate([
            'month' => 'required',
        ]);

        $start = Carbon::createFromFormat('Y-m', $request->month)->firstOfMonth();
        $start_date = $start->format('Y-m-d');

        $end = Carbon::createFromFormat('Y-m', $request->month)->lastOfMonth();
        $end_date = $end->format('Y-m-d');

        $monthly_feedbacks = CustomerFeedback::select('id', 'rating', 'review','user_id','date')
        ->whereBetween('date', [$start_date, $end_date])
            ->paginate(2);

        $msg = 'There is no feedback in this month.';

        if(count($monthly_feedbacks) == 0)
        {
            return view('manager.view_customer_feedback')->with('msg',$msg);
        }
        else{
            return view('manager.view_customer_feedback')->with('monthly_feedbacks',$monthly_feedbacks);
        }
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
        // dd($request->all());
        $request->validate([
            'user_id' => 'required',
            'rating' => 'required',
            'review' => 'required',
        ]);
        
        $customer_feedback = new CustomerFeedback();
        $customer_feedback->rating = $request->rating;
        $customer_feedback->review = $request->review;
        $customer_feedback->date = Carbon::now();
        $customer_feedback->user_id = $request->user_id;
        $customer_feedback->save();

        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();

         
        return redirect()->route('user.feedback')->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
                        
    }

    /**
     * Display the specified resource.
     */
    public function show(CustomerFeedback $customerFeedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CustomerFeedback $customerFeedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CustomerFeedback $customerFeedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CustomerFeedback $customerFeedback)
    {
        //
    }
}
