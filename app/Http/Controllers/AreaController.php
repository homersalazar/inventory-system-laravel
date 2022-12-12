<?php

namespace App\Http\Controllers;

use App\Models\rack_tbl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AreaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = DB::table('rack_tbls')
        ->where('stats', '=' , 0)
        ->get();
        $queries = DB::table('rack_tbls')
        ->where('stats', '=' , 1)
        ->get();
        $sql = DB::table('rack_tbls')
        ->where('stats', '=' , 1)
        ->count('rack');
        return view('area.index', ['rows' => $rows, 'sql' => $sql, 'queries' => $queries]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('area.create');
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
            'rack' => 'required',
        ]);
        Rack_tbl::updateOrCreate(
            ['rack' => ucwords($request->rack)],
            ['stats' => 0 ]
        );
        return redirect()
        ->route('rack.index')
        ->with('success',''.ucwords($request->rack).' has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        DB::table('rack_tbls')
        ->select('rack')
        ->where('id',$id)
        ->update([
            'stats' => 0
        ]);
        return redirect()
        ->route('rack.index')
        ->with('success','Rack has been re-activated successfully.');
    }

    public function deact($id)
    {
        DB::table('rack_tbls')
        ->where('id',$id)
        ->update([
            'stats' => 1
        ]);
        return redirect()
        ->route('rack.index')
        ->with('success','Rack has been deactivated successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('rack_tbls')->find($id);
        return view('area.edit',['edit' => $edit]);
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
            'rack' => 'required'
        ]);

        DB::table('rack_tbls')
                ->where('id',$id)
                ->update([
                    'rack' => ucwords($request->rack)
                ]);

        return redirect()
        ->route('rack.index')
        ->with('success',' '.ucwords($request->rack).' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
