<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = DB::table('branch_tbls')
        ->where('stats', '=' , 0)
        ->get();
        // $row1 = DB::table('branch_tbls')
        // ->where('stats', '=' , 1)
        // ->get();
        return view('location.index', ['rows' => $rows]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('location.create');
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
            'branch' => 'required',
        ]);
        DB::table('branch_tbls')->insert([
            'branch' => ucwords($request->branch),
            'street' => ucwords($request->street),
            'city' => ucwords($request->city),
            'states' => ucwords($request->states),
            'zip' => $request->zip,
            'stats' => 0,
        ]);
        return redirect()
        ->route('branch.index')
        ->with('success',' '.ucwords($request->branch).' has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        DB::table('branch_tbls')
        ->where('id',$id)
        ->update([
            'stats' => 1
        ]);
        return redirect()
        ->route('branch.index')
        ->with('success','Location has been deleted successfully.');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('branch_tbls')->find($id);

        return view('location.edit',['edit' => $edit]);
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
        $request->validate([
            'branch' => 'required'
        ]);

        DB::table('branch_tbls')
                ->where('id',$id)
                ->update([
                    'branch' => ucwords($request->branch),
                    'street' => ucwords($request->street),
                    'city' => ucwords($request->city),
                    'states' => ucwords($request->states),
                    'zip' => $request->zip,
                ]);

        return redirect()
        ->route('branch.index')
        ->with('success',''.ucwords($request->branch).' updated successfully');
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
