<?php

namespace App\Http\Controllers;

use App\Models\Unit_tbl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('add.add_new_inventory',[
        //     'rows' => DB::table('Unit_tbl')
        //     ->orderBy('id','desc')
        //     ->get()
        // ]);

        return view('add.add_new_inventory');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('unit.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'unit' => 'required',
        ]);
        Unit_tbl::updateOrCreate(
            ['unit' => ucwords($request->unit)]
        );
        // return response()->json(['success'=>''.ucwords($request->unit).' saved successfully.']);
        return redirect()
            ->route('unit.index')
            ->with('success',''.ucwords($request->unit).' has been created successfully.');
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rows = Unit_tbl::where('id' , $id)->find($id);
        return view('creditcard.show',['rows' => $rows]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
