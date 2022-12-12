<?php

namespace App\Http\Controllers;

use App\Models\Brand_tbl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rows = DB::table('brand_tbls')
        ->where('stats', '=' , 0)
        ->get();
        $queries = DB::table('brand_tbls')
        ->where('stats', '=' , 1)
        ->get();
        $sql = DB::table('brand_tbls')
        ->where('stats', '=' , 1)
        ->count('brand');
        return view('brand.index', ['rows' => $rows, 'sql' => $sql, 'queries' => $queries]);
        // return view('add.add_new_inventory');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brand.create');
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
            'brand' => 'required',
        ]);
        Brand_tbl::updateOrCreate(
            ['brand' => ucwords($request->brand)],
            ['stats' => 0 ]
        );
        return redirect()
        ->route('brand.index')
        ->with('success',' '.ucwords($request->brand).' has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        DB::table('brand_tbls')
        ->where('id',$id)
        ->update([
            'stats' => 0
        ]);
        return redirect()
        ->route('brand.index')
        ->with('success','Brand has been Re-activated successfully.');    }

    public function brand_deact($id)
    {
        DB::table('brand_tbls')
        ->where('id',$id)
        ->update([
            'stats' => 1
        ]);
        return redirect()
        ->route('brand.index')
        ->with('success','Brand has been deactivated successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = DB::table('brand_tbls')->find($id);
        return view('brand.edit',['edit' => $edit]);
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
            'brand' => 'required'
        ]);

        DB::table('brand_tbls')
                ->where('id',$id)
                ->update([
                    'brand' => ucwords($request->brand)
                ]);

        return redirect()
        ->route('brand.index')
        ->with('success',''.ucwords($request->brand).' updated successfully');
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
