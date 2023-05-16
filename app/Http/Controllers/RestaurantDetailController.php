<?php

namespace App\Http\Controllers;

use App\Models\RestaurantDetail;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RestaurantDetailController extends Controller
{

    /*Home page*/
    public  function welcome(){
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        return view('welcome')->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }

    /*Home Page - About Section*/
    public  function about(){
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        return view('about')->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }

    /*Home Page - Services Section*/
    public  function services(){
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        return view('services')->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }

    /*Home Page - Review Section*/
    public  function review(){
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        return view('review')->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }

    /*Home Page - Gallery Section*/
    public  function gallery(){
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        return view('gallery')->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }

    /*Home Page - Contact Section*/
    public  function contact(){
        $restaurant_detail = RestaurantDetail::first();
        $phones = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->get();
        return view('contact')->with('restaurant_detail',$restaurant_detail)->with('phones',$phones);
    }

    /**
     * Display restaurant detail information for manager dashboard
     */
    public function index()
    {
        $restaurant_detail = RestaurantDetail::first();
        $phone = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->first();
        // foreach($phones as $phone){
        //     var_dump($phone->number);
        // }
        return view('info.dashboard')->with('restaurant_detail',$restaurant_detail)->with('phone',$phone);
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
        //
    }

    /**
     * show update form for restaurant details in manager dashboard
     */
    public function show($id)
    {
        $restaurant_detail = DB::table('restaurant_details')->where('id',$id)->first();
        $phone = DB::table('phones')->where('restaurant_detail_id',$restaurant_detail->id)->first();
        return view('info.update_form')->with('restaurant_detail',$restaurant_detail)->with('phone',$phone);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RestaurantDetail $restaurantDetail)
    {
        //
    }

    /**
     * Update restaurant details at Manager Dashboard
     */
    public function update(Request $request,$id)
    {
        

        $request->validate([
            'name'=> 'required',
            'logo'=> 'required',
            'email'=> 'required|email',
            'phone'=> 'required|min:9|max:11',
            'address'=> 'required',
            'opening_hour'=> 'required',
            'closing_hour'=>'required',
            ]);

            

            DB::table('restaurant_details')
            ->where('id',$id)
            ->update([
                'name'=>$request->name,
                'logo'=>$request->logo,
                'email'=>$request->email,
                'address'=>$request->address,
                'opening_hour'=>$request->opening_hour,
                'closing_hour'=>$request->closing_hour,
            ]);

            DB::table('phones')
            ->where('id',1)
            ->update([
                'number'=>$request->phone,
   
            ]);

            return redirect()->route('manager.info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RestaurantDetail $restaurantDetail)
    {
        //
    }
}
