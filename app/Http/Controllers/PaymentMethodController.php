<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use Illuminate\Support\Facades\DB;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment_methods = PaymentMethod::paginate(3);
        return view('paymentmethod.dashboard')->with('payment_methods',$payment_methods);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('paymentmethod.create_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'method_image'=>'required|mimes:jpeg,png,jpg,jfif,gif,svg|max:70480',
            'method_name'=>'required',
            'account_name'=>'required',
            'account_number'=>'required',
        ]);

        DB::table('payment_methods')->insert([
            'method_image'=>$request->file('method_image')->getClientOriginalName(),
            'method_name'=>$request->method_name,
            'account_name'=>$request->account_name,
            'account_number'=>$request->account_number,
        ]);

        $img = $request->file('method_image')->getClientOriginalName();
        $request->method_image->move(public_path('images'), $img);


        return redirect()->route('manager.paymentmethod');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {

        $payment_method = DB::table('payment_methods')->where('id',$request->id)->first();
        return view('paymentmethod.update_form')->with('payment_method',$payment_method);
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'method_name'=>'required',
            'account_name'=>'required',
            'account_number'=>'required|min:9',
        ]);


        if(isset($request->new_method_image))
        {
            $request->validate([
                'new_method_image'=>'required|mimes:jpeg,png,jpg,jfif,gif,svg|max:70480',
            ]);
            DB::table('payment_methods')
            ->where('id',$request->id)
            ->update([
                'method_image'=>$request->file('new_method_image')->getClientOriginalName(),
            'method_name'=>$request->method_name,
            'account_name'=>$request->account_name,
            'account_number'=>$request->account_number,
            ]);

            $img = $request->file('new_method_image')->getClientOriginalName();
            $request->new_method_image->move(public_path('images'), $img);
    
    
            return redirect()->route('manager.paymentmethod');
        }
        else
        {
            DB::table('payment_methods')
            ->where('id',$request->id)
            ->update([
            'method_name'=>$request->method_name,
            'account_name'=>$request->account_name,
            'account_number'=>$request->account_number,
            ]);

            return redirect()->route('manager.paymentmethod');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $payment_method = PaymentMethod::find($request->id);
        $payment_method->delete();

        return redirect()->route('manager.paymentmethod');
    }

}
