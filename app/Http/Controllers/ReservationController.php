<?php

namespace App\Http\Controllers;

// use Carbon\Carbon;
use Carbon\Carbon;
use App\Models\Fee;
use App\Models\Table;
use App\Models\Payment;
use App\Rules\DateBetween;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\PaymentConfirm;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{

    /* user make reservation - validate date before tomorrow and 
         time between open and close hour*/
    public function showReservationForm(Request $request){

        // date validate
        $currentDate = Carbon::now();
        $inputDate = Carbon::createFromFormat('Y-m-d', $request->date);
        $isWithinWeek = $inputDate->between($currentDate, $currentDate->copy()->addWeek());

        // time validate
        $restaurant_detail = DB::table('restaurant_details')->first();
        $opening_hour = $restaurant_detail->opening_hour;
        $closing_hour = $restaurant_detail->closing_hour;
        $time = Carbon::createFromFormat('H:i', $request->time);
        $request_time = $time->format('H:i:s');
        $startTime = Carbon::createFromFormat('H:i:s', $opening_hour);
        $endTime = Carbon::createFromFormat('H:i:s', $closing_hour);
        $inputTime = Carbon::createFromFormat('H:i:s', $request_time);
        $isWithinTimeRange = $inputTime->between($startTime, $endTime);

        if(!$isWithinWeek){
            return redirect()->route('/')->with('msg','Please choose date within tomorrow from a week');
        }
        if(!$isWithinTimeRange){
            return redirect()->route('/')->with('msg','Please choose time within open hours');
        }
        else{
            $data = $request->all();
            $fee = DB::table('fees')->where('date', $request->date)->first();
            $tables = Table::where('max_capacity','>=',$request->guest_number)->get();
            $payment_methods = PaymentMethod::all();
            return view('reservation.form')->with('data',$data)->with('fee',$fee)->with('tables',$tables)->with('payment_methods',$payment_methods);
        }
        
        if($isWithinWeek && $isWithinTimeRange)
        {
            $data = $request->all();
            $fee = DB::table('fees')->where('date', $request->date)->first();
            $tables = Table::where('max_capacity','>=',$request->guest_number)->get();
            $payment_methods = PaymentMethod::all();
            return view('reservation.form')->with('data',$data)->with('fee',$fee)->with('tables',$tables)->with('payment_methods',$payment_methods);
        }
    }

    /**
     * Display a listing of the resource in staff dashboard
     */
    public function index()
    {
        $reservations = DB::table('reservations')
        ->where('deleted_at',NULL)
        ->where('status','pending')
        ->select('id','guest_number','start_time','end_time','status','date')
        ->orderByDesc('date')
        ->paginate(4);
        return view('staff.reservation')->with('reservations',$reservations);
    }



    /**
     * Store a newly created resource in storage.
     * validate table avaliablility between start time and end time
     */
    public function store(Request $request)
    {

        
        $request->validate([
            'guest_number'=> 'required',
            'date'=> 'required',
            'time'=> 'required',
            'fee'=> 'required',
            'table'=> 'required',
            'user'=>'required',
            ]);
        

        $table_id = $request->table;
        $date = $request->date;
        $res_date = Carbon::createFromFormat('Y-m-d', $date);

        $time = Carbon::createFromFormat('H:i', $request->time);
        $request_time = $time->format('H:i:s');
        $start_time = Carbon::createFromFormat('H:i:s', $request_time);

        $add_time = strtotime($request->time)+ 3*60*60;
        $end = date('H:i',$add_time);
        $request_end = Carbon::createFromFormat('H:i', $end);
        $request_end_time = $request_end->format('H:i:s');
        $end_time = Carbon::createFromFormat('H:i:s', $request_end_time);

        
        $existingReservations = Reservation::where('table_id', $table_id)
            ->whereDate('date', '=', $res_date)
            ->where(function($query) use ($start_time, $end_time) {
                $query->whereBetween('start_time', [$start_time, $end_time])
                      ->orWhereBetween('end_time', [$start_time, $end_time])
                      ->orWhere(function($query) use ($start_time, $end_time) {
                          $query->where('start_time', '<=', $start_time)
                                ->where('end_time', '>=', $end_time);
                      });
            })
            ->count();

        if($existingReservations == 0){

            $reservation = new Reservation();
            $reservation->guest_number = $request->guest_number;
            $reservation->date = $request->date;
            $reservation->start_time = $request->time;
            $reservation->end_time = $end_time;
            $reservation->table_id = $request->table;
            $reservation->fee_id = $request->fee;
            $reservation->user_id = $request->user;
            $reservation->save();
            $payment_method = PaymentMethod::find($request->payment_method);

            return view('payment.form')->with('reservation',$reservation)->with('payment_method',$payment_method);
            
        }
        else
        {
            return back()->with('msg','This table is already reserved!');
        }

    }



    /* View Reservation by ID in staff dashboard*/
    public function view(Request $request){
        $reservation = Reservation::find($request->id);
        $payment = Payment::where('reservation_id',$reservation->id)->first();
        $payment_confirm = PaymentConfirm::where('payment_id',$payment->id)->first();
        $msg = "Action";
        if($payment_confirm == NULL)
            return view('staff.view_reservation')->with('reservation',$reservation)->with('payment',$payment)->with('msg',$msg);
        else
            return view('staff.view_reservation')->with('reservation',$reservation)->with('payment',$payment)->with('payment_confirm',$payment_confirm);

    }



    /**Search reservation by date in staff dashboard */
    public function searchByDate(Request $request)
    {
        $request->validate([
            'date'=> 'required',
            ]);


            $reservations_by_date = DB::table('reservations')
            ->where('deleted_at',NULL)
            ->where('date',$request->date)
            ->get();
        $msg = "There is no reservation";
        if($reservations_by_date == NULL){
            return view('staff.reservation')->with('msg',$msg);
        }else{
            return view('staff.reservation')->with('reservations_by_date',$reservations_by_date);
        }

        
    }

    /*show status update form view in staff dashboard*/
    public function showUpdateForm(Request $request){
        $reservation = Reservation::find($request->id);
        return view('staff.reservation_update')->with('reservation',$reservation);
    }

    /**
     * Display the specified resource in staff dashboard
     */
    public function show(Request $request)
    {
        $reservation = Reservation::find($request->id);

        return view('staff.reservation_details')->with('reservation',$reservation);
    }


    /**
     * Update the specified resource in storage 
     * update reservation status in staff dashboard
     */
    public function update(Request $request)
    {
        $reservation = Reservation::where('id',$request->id)->update(['status' => $request->status]);
        return redirect()->route('staff.reservation_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        // dd($request->all());
        $reservation = Reservation::find($request->id);
        $reservation->delete();
        return redirect()->route('staff.reservation_index');
    }
}
