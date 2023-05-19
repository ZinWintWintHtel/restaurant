<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Manager;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\PaymentConfirm;
use App\Models\CustomerFeedback;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ManagerController extends Controller
{

    public function viewReservation(){
        $today = date('Y-m-d');
        $reservations = Reservation::where('date',$today)->paginate(7);
        return view('manager.view_reservation')->with('reservations',$reservations);  
    }

    /* Display view for update profile manager dashboard*/
    public function showUpdateForm(){
        $manager = Manager::first();
        return view('manager.update_profile_form')->with('manager',$manager);
    }

     /* Update Manager Profile*/
    public function updateProfile(Request $request){

        $request->validate([
            'name'=>'required|alpha',
            'email'=>'required|email',
            'phone'=>'required|min:9|max:11',
            'old_photo'=>'required',
        ]);


        if(isset($request->new_photo))
        {
            $request->validate([
                'new_photo'=>'mimes:jpeg,png,jpg,jfif,gif,svg|max:70480',
            ]);
            DB::table('managers')
            ->where('id',$request->id)
            ->update([
                'photo'=>$request->file('new_photo')->getClientOriginalName(),
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
            ]);

            $img = $request->file('new_photo')->getClientOriginalName();
            $request->new_photo->move(public_path('images'), $img);

            $imagePath = public_path('images/'.$request->old_photo);
                if (File::exists($imagePath)) {
                    File::delete($imagePath);
            }
    
    
            return redirect()->route('manager.profile');
        }
        else
        {
            DB::table('managers')
            ->where('id',$request->id)
            ->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            ]);

            return redirect()->route('manager.profile');
        }
    }
         
    /* Update Manager Password*/
    public function changePasswordForm(){
        return view('manager.change_password_form');
    }

    public function changePassword(Request $request){

        $request->validate([
            'old_password'=>'required|min:6|max:100',
            'new_password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:new_password',
        ]);
        $current_user = Auth::guard('manager')->user();

        if(Hash::check($request->old_password,$current_user->password))
        {
            $current_user->update([
                'password'=>Hash::make($request->new_password)
            ]);
            return redirect()->route('manager.profile')->with('msg','Successfully changed your password');
        }
        else{
            return redirect()->back()->with('msg','Old password does not match');
        }
    }

    /**
     * Display Manager Dashboard login
     */
    public function index()
    {
        return view('manager.login');
    }

    /* Manager Dashboard View*/
    public function dashboard()
    {

        $reservation_count = DB::table('reservations')->where('status','completed')->count();
        $customer_count = DB::table('users')->count();
        $staff_count = DB::table('staff')->where('deleted_at',NULL)->count();
        $table_count = DB::table('tables')->where('deleted_at',NULL)->count();

        $default_start_date = '2023-01-01';
        $default_end_date = '2023-12-31';

        $default_monthly_guests = Reservation::whereBetween('date', [$default_start_date, $default_end_date])
            ->where('status','completed')
            ->select(DB::raw('DATE_FORMAT(date, "%Y-%m") as month'), DB::raw('SUM(guest_number) as total_guests'))
            ->groupBy('month')
            ->get();

            $default_reservations = DB::table('reservations')
            ->where('status','completed')
            ->select(DB::raw('date(date) as reservation_date, count(*) as reservation_count'))
            ->whereBetween('date', [$default_start_date, $default_end_date])
            ->groupBy('reservation_date')
            ->get();

            $default_guest_reservations = Reservation::select('guest_number', DB::raw('COUNT(*) as reservations'))
                            ->where('status','completed')
                            ->whereBetween('date', [$default_start_date, $default_end_date])
                           ->groupBy('guest_number')
                           ->get();



        return view('manager.dashboard')->with('reservation_count',$reservation_count)->with('customer_count',$customer_count)
        ->with('staff_count',$staff_count)->with('table_count',$table_count)->with('default_monthly_guests',$default_monthly_guests)
        ->with('default_reservations',$default_reservations)->with('default_guest_reservations',$default_guest_reservations);
    }



        /* View Reservation by ID in manager dashboard*/
        public function viewReservationDetails(Request $request){
            $reservation = Reservation::find($request->id);
            $payment = Payment::where('reservation_id',$reservation->id)->first();
            $payment_confirm = PaymentConfirm::where('payment_id',$payment->id)->first();
            $msg = "Action";
        if($payment_confirm == NULL)
            return view('manager.reservation_details')->with('reservation',$reservation)->with('payment',$payment)->with('msg',$msg);
        else
            return view('manager.reservation_details')->with('reservation',$reservation)->with('payment',$payment)->with('payment_confirm',$payment_confirm);

        }

    /* Manager Dashboard Login */
    public function login(Request $request){
        // dd($request->all());

        $check = $request->all();
        if(Auth::guard('manager')->attempt(['email'=>$check['email'], 'password'=>$check['password']]))
        {
            return redirect()->route('manager.dashboard');
        }
        else{
            return back()->with('msg','Invalid Email or Password');
        }
    }
    
    /* Manager Logout*/
    public function logout(){
        Auth::guard('manager')->logout();
        return redirect()->route('manager_login_form');
    }

    /* Manager Dashboard profile view*/
    public function profile(){
        $manager = Manager::first();
        return view('manager.profile')->with('manager',$manager);
    }

    /* Manager dashboard monthly number of customers report*/
    public function showCustomerMonthlyReport(Request $request){
        $request->validate([
            'start_month'=>'required',
            'end_month'=>'required',
        ]);

        $default_start_date = '2023-01-01';
        $default_end_date = '2023-12-31';

        $default_reservations = DB::table('reservations')
            ->where('status','completed')
            ->select(DB::raw('date(date) as reservation_date, count(*) as reservation_count'))
            ->whereBetween('date', [$default_start_date, $default_end_date])
            ->groupBy('reservation_date')
            ->get();

            $default_guest_reservations = Reservation::select('guest_number', DB::raw('COUNT(*) as reservations'))
                            ->where('status','completed')
                            ->whereBetween('date', [$default_start_date, $default_end_date])
                           ->groupBy('guest_number')
                           ->get();
        
        $start = Carbon::createFromFormat('Y-m', $request->start_month)->firstOfMonth();
        $start_date = $start->format('Y-m-d');
        

        $end = Carbon::createFromFormat('Y-m', $request->end_month)->lastOfMonth();
        $end_date = $end->format('Y-m-d');

        
        $monthly_guests = Reservation::whereBetween('date', [$start_date, $end_date])
            ->where('status','completed')
            ->select(DB::raw('DATE_FORMAT(date, "%Y-%m") as month'), DB::raw('SUM(guest_number) as total_guests'))
            ->groupBy('month')
            ->get();

            $reservation_count = DB::table('reservations')->where('status','completed')->count();
        $customer_count = DB::table('users')->count();
        $staff_count = DB::table('staff')->where('deleted_at',NULL)->count();
        $table_count = DB::table('tables')->where('deleted_at',NULL)->count();
        $monthly_customer = 'There is no customer between chosen month.';


            if(count($monthly_guests) == 0){
                return view('manager.dashboard')->with('reservation_count',$reservation_count)->with('customer_count',$customer_count)
                        ->with('staff_count',$staff_count)->with('table_count',$table_count)->with('monthly_customer',$monthly_customer)
                        ->with('default_reservations',$default_reservations)->with('default_guest_reservations',$default_guest_reservations);
            }
            else
            {
                return view('manager.dashboard')->with('reservation_count',$reservation_count)->with('customer_count',$customer_count)
                        ->with('staff_count',$staff_count)->with('table_count',$table_count)->with('monthly_guests',$monthly_guests)
                        ->with('default_reservations',$default_reservations)->with('default_guest_reservations',$default_guest_reservations);
            }
    }

    /* Manager Dashboard number of reservation between start date and end date report*/
    public function showReservationCountReport(Request $request){
        $request->validate([
            'start_date'=>'required',
            'end_date'=>'required',
        ]);

        $default_start_date = '2023-01-01';
        $default_end_date = '2023-12-31';

        $default_monthly_guests = Reservation::whereBetween('date', [$default_start_date, $default_end_date])
            ->where('status','completed')
            ->select(DB::raw('DATE_FORMAT(date, "%Y-%m") as month'), DB::raw('SUM(guest_number) as total_guests'))
            ->groupBy('month')
            ->get();

            $default_guest_reservations = Reservation::select('guest_number', DB::raw('COUNT(*) as reservations'))
                            ->where('status','completed')
                            ->whereBetween('date', [$default_start_date, $default_end_date])
                           ->groupBy('guest_number')
                           ->get();

        $reservations = DB::table('reservations')
        ->where('status','completed')
        ->select(DB::raw('date(date) as reservation_date, count(*) as reservation_count'))
        ->whereBetween('date', [$request->start_date, $request->end_date])
        ->groupBy('reservation_date')
        ->get();

        $reservation_count = DB::table('reservations')->where('status','completed')->count();
        $customer_count = DB::table('users')->count();
        $staff_count = DB::table('staff')->where('deleted_at',NULL)->count();
        $table_count = DB::table('tables')->where('deleted_at',NULL)->count();
        $reservation_msg = 'There is no reservation between chosen date.';

        if(count($reservations) == 0){
            return view('manager.dashboard')->with('reservation_count',$reservation_count)->with('customer_count',$customer_count)
                    ->with('staff_count',$staff_count)->with('table_count',$table_count)->with('reservation_msg',$reservation_msg)
                    ->with('default_monthly_guests',$default_monthly_guests)->with('default_guest_reservations',$default_guest_reservations);
        }
        else
        {
            return view('manager.dashboard')->with('reservation_count',$reservation_count)->with('customer_count',$customer_count)
                    ->with('staff_count',$staff_count)->with('table_count',$table_count)->with('reservations',$reservations)
                    ->with('default_monthly_guests',$default_monthly_guests)->with('default_guest_reservations',$default_guest_reservations);
        }
    }

    /* Manager Dashboard Number of reservation by Guest Number report*/
    public function showReservationGuestCountReport(Request $request){
        $request->validate([
            'start_date'=>'required',
            'end_date'=>'required',
        ]);

        $default_start_date = '2023-01-01';
        $default_end_date = '2023-12-31';

        $default_monthly_guests = Reservation::whereBetween('date', [$default_start_date, $default_end_date])
            ->where('status','completed')
            ->select(DB::raw('DATE_FORMAT(date, "%Y-%m") as month'), DB::raw('SUM(guest_number) as total_guests'))
            ->groupBy('month')
            ->get();

            $default_reservations = DB::table('reservations')
            ->where('status','completed')
            ->select(DB::raw('date(date) as reservation_date, count(*) as reservation_count'))
            ->whereBetween('date', [$default_start_date, $default_end_date])
            ->groupBy('reservation_date')
            ->get();

        $guest_reservations = Reservation::select('guest_number', DB::raw('COUNT(*) as reservations'))
                            ->where('status','completed')
                            ->whereBetween('date', [$request->start_date, $request->end_date])
                           ->groupBy('guest_number')
                           ->get();

        $reservation_count = DB::table('reservations')->where('status','completed')->count();
        $customer_count = DB::table('users')->count();
        $staff_count = DB::table('staff')->where('deleted_at',NULL)->count();
        $table_count = DB::table('tables')->where('deleted_at',NULL)->count();
        $guest_msg = 'There is no reservation between chosen date.';


        
        if(count($guest_reservations) == 0){
            return view('manager.dashboard')->with('reservation_count',$reservation_count)->with('customer_count',$customer_count)
                    ->with('staff_count',$staff_count)->with('table_count',$table_count)->with('guest_msg',$guest_msg)
                    ->with('default_monthly_guests',$default_monthly_guests)->with('default_reservations',$default_reservations);
        }
        else
        {
            return view('manager.dashboard')->with('reservation_count',$reservation_count)->with('customer_count',$customer_count)
                    ->with('staff_count',$staff_count)->with('table_count',$table_count)->with('guest_reservations',$guest_reservations)
                    ->with('default_monthly_guests',$default_monthly_guests)->with('default_reservations',$default_reservations);
        }
        
    }
}
