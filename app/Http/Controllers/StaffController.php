<?php

namespace App\Http\Controllers;

use Auth;
use Carbon\Carbon;
use App\Models\Staff;
use App\Models\Payment;
use App\Models\Reservation;
use Illuminate\Http\Request;
use App\Models\PaymentConfirm;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Pagination\LengthAwarePaginator;

class StaffController extends Controller
{
    /* View Profile in Staff Dashboard*/
    public function profile(){
        $staff = Auth::guard('staff')->user();
        return view('staff.profile')->with('staff',$staff);
    }

    /** find Reservation -  payment confirm by staff  */
    public function staffReservation(){
        $staff = Auth::guard('staff')->user();
        $payment_confirms = PaymentConfirm::where('staff_id',$staff->id)->get();
        $payments = [];
        $reservations = [];
        for($i=0;$i<count($payment_confirms);$i++){
            $payments[$i] = Payment::where('id',$payment_confirms[$i]->payment_id)->first();
            $reservations[$i] = Reservation::where('id',$payments[$i]->reservation_id)->first();
        }

        $perPage = 7; // number of items to display per page
        $page = request()->get('page', 1); // get the current page from the request query string
        $offset = ($page * $perPage) - $perPage;
        $pagedData = array_slice($reservations, $offset, $perPage);
        $paginatedData = new LengthAwarePaginator($pagedData, count($reservations), $perPage, $page, [
            'path' => request()->url(), // the URL path for the pagination links
            'query' => request()->query(), // the query string parameters to include in the pagination links
        ]);

        return view('staff.own_reservation')->with('paginatedData',$paginatedData);
    }

    /* Show Profile Update in Staff Dashboard*/
    public function showUpdateProfileForm(Request $request)
    {
        $staff = Auth::guard('staff')->user();
        return view('staff.update_profile')->with('staff',$staff);
    }

    /* Update Profile in Staff Dashboard*/
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|min:9|max:11',
        ]);


        if(isset($request->new_photo))
        {
            $request->validate([
                'new_photo'=>'mimes:jpeg,png,jpg,jfif,gif,svg|max:70480',
            ]);
    


            DB::table('staff')
            ->where('id',$request->id)
            ->update([
                'photo'=>$request->file('new_photo')->getClientOriginalName(),
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            ]);

            $img = $request->file('new_photo')->getClientOriginalName();
            $request->new_photo->move(public_path('images'), $img);
    
    
            return redirect()->route('staff.profile');
        }
        else
        {
            DB::table('staff')
            ->where('id',$request->id)
            ->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            ]);

            return redirect()->route('staff.profile');
        }
    }

    /* Staff Login Form View*/
    public function showLoginForm(){
        return view('staff.login');
    }

    /* Staff login*/
    public function login(Request $request){
                // dd($request->all());

                $check = $request->all();
                if(Auth::guard('staff')->attempt(['email'=>$check['email'], 'password'=>$check['password']]))
                {
                    return redirect()->route('staff.dashboard');
                }
                else{
                    return back()->with('msg','Invalid Email or Password');
                }
    }

    /* Staff Dashboard - retrevie reservation by today date */
    public function dashboard(){
        $today = date('Y-m-d');
        $reservations = DB::table('reservations')->where('date',$today)->count();

        $customers = DB::table('reservations')->where('date',$today)
            ->sum('guest_number');
        

        
        $today_reservations = DB::table('reservations')->where('date',$today)->paginate(5);

        return view('staff.staffDashboard')->with('reservations',$reservations)->with('customers',$customers)
        ->with('today_reservations',$today_reservations);
    }

    /* Staff Logout*/
    public function logout(){
        Auth::guard('staff')->logout();
        return redirect()->route('staff_login_form');
    }

    /* Staff Password Update form view */
    public function showUpdatePasswordForm(){
        return view('staff.update_password');
    }

    /* Update Staff Password*/
    public function updatePassword(Request $request)
    {
        $request->validate([
            'old_password'=>'required|min:6|max:100',
            'new_password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:new_password',
        ]);
        $current_user = Auth::guard('staff')->user();

        if(Hash::check($request->old_password,$current_user->password))
        {
            $current_user->update([
                'password'=>Hash::make($request->new_password)
            ]);
            return redirect()->route('staff.profile')->with('msg','Successfully changed your password');
        }
        else{
            return redirect()->back()->with('msg','Old password does not match');
        }
    }
    
    /**
     * Display a listing of the resource in manager dashboard
     */
    public function index()
    {
        $staffs = DB::table('staff')->where('deleted_at',NULL)->select('id','name','email','phone','photo')->paginate(4);
        // $staffs = Staff::all();
        return view('staff.dashboard')->with('staffs',$staffs);
    }

    /**
     * Show the form for creating a new resource. in manager dashboard
     */
    public function create()
    {
        return view('staff.create_new_staff');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'photo'=>'required|mimes:jpeg,png,jpg,jfif,gif,svg|max:70480',
            'name'=>'required|alpha',
            'email'=>'required|email',
            'phone'=>'required|min:9|max:11',
        ]);



        DB::table('staff')->insert([
            'photo'=>$request->file('photo')->getClientOriginalName(),
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Hash::make('password'),
        ]);

        $img = $request->file('photo')->getClientOriginalName();
        $request->photo->move(public_path('images'), $img);


        return redirect()->route('manager.staff');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        // dd($request->all());
        $staff = DB::table('staff')->where('id',$request->id)->first();
        return view('staff.update_form')->with('staff',$staff);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // dd($request->file('photo')->getClientOriginalName());
        $request->validate([
            'name'=>'required|alpha',
            'email'=>'required|email',
            'phone'=>'required|min:9|max:11',
        ]);

        if(isset($request->new_photo))
        {
            DB::table('staff')
            ->where('id',$request->id)
            ->update([
                'photo'=>$request->file('new_photo')->getClientOriginalName(),
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            ]);

            $img = $request->file('new_photo')->getClientOriginalName();
            $request->new_photo->move(public_path('images'), $img);
    
    
            return redirect()->route('manager.staff');
        }
        else
        {
            DB::table('staff')
            ->where('id',$request->id)
            ->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            ]);

            return redirect()->route('manager.staff');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $staff = DB::table('staff')->where('id',$request->id)->first();
        DB::table('staff')
            ->where('id',$request->id)
            ->update([
            'deleted_at'=>Carbon::now(),
            ]);


        return redirect()->route('manager.staff');
    }
}
