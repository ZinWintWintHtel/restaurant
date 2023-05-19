<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\RestaurantDetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{


    /* User Dashboard - view user profile*/
    public function show()
    {
        $user = Auth::user();
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        return view('show_profile')->with('user',$user)->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }

    /* show login user update form view*/
    public function showUpdateForm(){
        $user = Auth::user();
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        return view('update_profile_form')->with('user',$user)->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }

    /* update user information */
    public function update(Request $request){

        $request->validate([
            'name'=>'required|alpha',
            'email'=>'required|email',
            'phone'=>'required|min:9|max:11',
        ]);

           DB::table('users')
            ->where('id',$request->id)
            ->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
            ]);


            return redirect()->route('profile_show');
    }

    /* view user password update form*/
    public function showPasswordUpdateForm(){
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        return view('change_password_form')->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }

    /* update user password*/
    public function changePassword(Request $request){
        $request->validate([
            'old_password'=>'required|min:6|max:100',
            'new_password'=>'required|min:6|max:100',
            'confirm_password'=>'required|same:new_password',
        ]);
        $current_user = auth()->user();
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();

        if(Hash::check($request->old_password,$current_user->password))
        {
            $current_user->update([
                'password'=>Hash::make($request->new_password)
            ]);
            return redirect()->back()->with('msg','Successfully changed your password')->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
        }
        else{
            return redirect()->back()->with('msg','Old password does not match')->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
        }

    }


    /* view all users in staff dashboard*/
    public function viewCustomer(){
        $users = DB::table('users')->paginate(7);
        return view('staff.customer')->with('users',$users);
    }

    /* search user by email */
    public function searchByEmail(Request $request){
        $request->validate([
            'email'=>'required|email',
        ]);
        $users = DB::table('users')->paginate(7);
        $search_user = DB::table('users')->where('email',$request->email)->first();
        $msg = "There is no registered customer with this eamil.";
        if($search_user == NULL){
            return view('staff.customer')->with('users',$users)->with('msg',$msg);
        }
        else{
            return view('staff.customer')->with('users',$users)->with('search_user',$search_user);
        }

    }

}
