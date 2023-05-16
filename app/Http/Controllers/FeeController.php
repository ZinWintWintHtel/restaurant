<?php

namespace App\Http\Controllers;

use App\Models\Fee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = DB::table('fees')->where('deleted_at',NULL)->orderBy('date', 'desc')->paginate(7);

        return view('fee.dashboard')->with('fees',$fees);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fee.create_form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'amount'=>'required|numeric',
            'date'=>'required',
        ]);

        DB::table('fees')->insert([
            'amount'=>$request->amount,
            'date'=>$request->date,
        ]);


        return redirect()->route('manager.fee');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $fee = DB::table('fees')->where('id',$request->id)->first();
        return view('fee.update_form')->with('fee',$fee);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Fee $fee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'amount'=>'required|numeric',
            'date'=>'required',
        ]);

        DB::table('fees')
            ->where('id',$request->id)
            ->update([
                'amount'=>$request->amount,
                'date'=>$request->date,
            ]);

            return redirect()->route('manager.fee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $fee = Fee::find($request->id);
        $fee->delete();

        return redirect()->route('manager.fee');
    }
}
