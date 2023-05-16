<?php

namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tables = Table::paginate(7);
        return view('staff.table')->with('tables',$tables);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('staff.create_new_table');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'table_name'=>'required',
            'max_capacity'=>'required',
        ]);

        DB::table('tables')->insert([
            'table_name'=>$request->table_name,
            'max_capacity'=>$request->max_capacity,
        ]);

        return redirect()->route('staff.table_index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $table = DB::table('tables')->where('id',$request->id)->first();
        return view('staff.update_table_form')->with('table',$table);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $request->validate([
            'table_name'=>'required',
            'max_capacity'=>'required',
        ]);

        DB::table('tables')
        ->where('id',$request->id)
        ->update([
            'table_name'=>$request->table_name,
            'max_capacity'=>$request->max_capacity,
        ]);

        return redirect()->route('staff.table_index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Request $request)
    {
        $table = Table::find($request->id);
        $table->delete();

        return redirect()->route('staff.table_index');
    }
}
