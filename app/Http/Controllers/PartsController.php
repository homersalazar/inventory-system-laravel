<?php

namespace App\Http\Controllers;

use App\Models\Parts_list;
use App\Models\Tran_tbl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
// use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class PartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add.add_inventory');

    }
    public function remove_index()
    {
        return view('remove.index');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = DB::table('rack_tbls')
            ->where('stats', '=', 0)
            ->get();
        $brands = DB::table('brand_tbls')
            ->where('stats', '=', 0)
            ->get();
        $units = DB::table('unit_tbls')
            ->get();
            return view('add.add_new_inventory',[
            'areas' => $areas,
            'brands' => $brands,
            'units' => $units ],
        );
    }

    function autocomplete(Request $request)
    {
        if($request->get('query')) {
            $query = $request->get('query');
            $output = '';
            $data = DB::table('parts_lists')
                ->leftJoin('brand_tbls', 'parts_lists.b_id', '=', 'brand_tbls.id')
                ->where('details' ,'LIKE', "%{$query}%")
                ->orWhere('sku' ,'LIKE', "%{$query}%")
                ->get();
            if(count($data)>0) {
                $output .= '<table class=" table mt-3">
                    <tr>
                        <th>Name</th>
                        <th>Sku</th>
                        <th>Part #</th>
                        <th>Brand</th>
                    </tr>
                </div>';
                foreach ($data as $row) {
                    $output .= '<tbody>
                        <tr>
                            <td><a href="'.route('add.edit', $row->sku).'">'.ucwords($row->details).'</td>
                            <td>ghecc'.$row->sku.'</a></td>
                            <td>'.$row->partno.'</td>
                            <td>'.ucwords($row->brand).'</td>
                        </tr>
                    </tbody>';
                }
            }else{
                $output .= '<hr>
                <div class="text-center">Item Not Found</div>
                <hr>';

            }
            $output .= '</div>';
            return $output;
            return view('add.add_quantity');
        }

    }

    function remove_autocomplete(Request $request)
    {
        if($request->get('query')) {
            $query = $request->get('query');
            $output = '';
            $data = DB::table('parts_lists')
                ->leftJoin('brand_tbls', 'parts_lists.b_id', '=', 'brand_tbls.id')
                ->where('details', 'LIKE', "%{$query}%")
                ->get();
            if(count($data)>0) {
                $output .= '<table class=" table mt-5">
                    <tr>
                        <th>Sku</th>
                        <th>Description</th>
                        <th>Part #</th>
                        <th>Brand</th>
                    </tr>
                </div>';
                foreach ($data as $row) {
                    $output .= '<tbody>
                        <tr>
                            <td><a href="'.route('remove_edit', $row->sku).'">GHECC-'.$row->sku.'</a></td>
                            <td>'.ucwords($row->details).'</td>
                            <td>'.$row->partno.'</td>
                            <td>'.ucwords($row->brand).'</td>
                        </tr>
                    </tbody>';
                }
            }else{
                $output .= '<hr>
                <div class="text-center">Item Not Found</div>
                <hr>';

            }
            $output .= '</div>';
            return $output;
            return view('remove.index');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $min = !empty($ocs)  ? $request->over : 1;
        $request->validate([
            'part_name' => 'required',
        ]);
        Parts_list::create([
            'b_id' => $request->brand,
            'details' => $request->part_name,
            'partno' => $request->part_no,
            'serialno' => $request->serial,
            'u_id' => $request->unit,
            'r_id' => $request->rack,
            'min_stock' => $min,
            'comments' => $request->summary,
            'stats' => 0,
        ]);
        return redirect()
        ->route('add.create')
        ->with('success',''.ucwords($request->part_name).' has been created successfully.');
    }

    public function add_quantity(Request $request)
    {
        $request->validate([
            'quantity' => 'required',
        ]);
        Tran_tbl::create([
            'sku' => $request->sku,
            'user' => Auth::user()->id,
            'location' => Auth::user()->branch_id,
            'types' => 0, // add
            'quantity' => $request->quantity,
            'mpr' => $request->mpr,
            'unit_cost' => $request->UC,
            'unit_refund' => $request->UR,
            'drno' => $request->drno,
            'received_by' => $request->e_user,
            'action' => 0,
            'date_in' => $request->date_in,
        ]);
        return redirect()
        ->route('add.index')
        ->with('success','Added successfully.');
    }

    public function remove_quantity(Request $request)
    {
        $request->validate([
            'qty' => 'required',
        ]);
        Tran_tbl::create([
            'sku' => $request->sku,
            'user' => Auth::user()->id,
            'location' => Auth::user()->branch_id,
            'types' => 1, // remove
            'quantity' => $request->qty,
            'unit_cost' => $request->UC,
            'received_by' => $request->issued_to,
            'action' => 0,
            'date_in' => $request->date_in,
        ]);
        return redirect()
        ->route('remove_index')
        ->with('success','Remove successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($sku)
    {
        $user_id = Auth::user()->branch_id;
        $row = DB::table('parts_lists')
        ->select(
            'parts_lists.sku as skus',
            'details',
            'rack',
            'branch',
            'partno',
            'brand',
            'unit'
            )
        ->leftJoin('unit_tbls', 'parts_lists.u_id', '=', 'unit_tbls.id')
        ->leftJoin('rack_tbls', 'parts_lists.r_id', '=', 'rack_tbls.id')
        ->leftJoin('tran_tbls', 'parts_lists.sku', '=', 'tran_tbls.sku')
        ->leftJoin('brand_tbls', 'parts_lists.b_id', '=', 'brand_tbls.id')
        ->leftJoin('branch_tbls', 'tran_tbls.location', '=', 'branch_tbls.id')
        ->where('parts_lists.sku' ,$sku)
        ->first();

        $stock_in = DB::table('tran_tbls')
        ->leftJoin('parts_lists', 'parts_lists.sku', '=', 'tran_tbls.sku')
        ->where('types' ,0)
        ->where('location' ,$user_id)
        ->where('parts_lists.sku' ,$sku)
        ->sum('quantity');

        $stock_out = DB::table('tran_tbls')
        ->leftJoin('parts_lists', 'parts_lists.sku', '=', 'tran_tbls.sku')
        ->where('location' ,$user_id)
        ->where('parts_lists.sku' ,$sku)
        ->where('types' ,1)
        ->sum('quantity');

        $sql = Tran_tbl::where('sku', $sku)
        ->leftJoin('branch_tbls', 'tran_tbls.location', '=', 'branch_tbls.id')
        ->leftJoin('users', 'tran_tbls.user', '=', 'users.id')
        ->get();

        $total = $stock_in - $stock_out;

        return view('add.item', [
            'row' => $row ,
            'total' => $total,
            'sql' => $sql
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($sku)
    {
        $user_id = Auth::user()->branch_id;
        $row = DB::table('parts_lists')
        ->select(
            'parts_lists.sku as skus',
            'details',
            'rack',
            'branch'
            )
        ->leftJoin('rack_tbls', 'parts_lists.r_id', '=', 'rack_tbls.id')
        ->leftJoin('tran_tbls', 'parts_lists.sku', '=', 'tran_tbls.sku')
        ->leftJoin('branch_tbls', 'tran_tbls.location', '=', 'branch_tbls.id')
        ->where('parts_lists.sku' ,$sku)
        ->first();

        $stock_in = DB::table('tran_tbls')
        ->leftJoin('parts_lists', 'parts_lists.sku', '=', 'tran_tbls.sku')
        ->where('location' ,$user_id)
        ->where('parts_lists.sku' ,$sku)
        ->where('types' ,0)
        ->sum('quantity');

        $stock_out = DB::table('tran_tbls')
        ->leftJoin('parts_lists', 'parts_lists.sku', '=', 'tran_tbls.sku')
        ->where('location' ,$user_id)
        ->where('parts_lists.sku' ,$sku)
        ->where('types' ,1)
        ->sum('quantity');
        $total = $stock_in - $stock_out;
        return view('add.add_quantity', ['row' => $row , 'total' => $total]);
    }

    // public function edit_trans($id)
    // {
    //     return view('add.edit_trans');
    // }

    public function remove_edit($sku)
    {
        $user_id = Auth::user()->branch_id;
        $row = DB::table('parts_lists')
        ->select(
            'parts_lists.sku as skus',
            'details',
            'rack',
            'branch'
            )
        ->leftJoin('rack_tbls', 'parts_lists.r_id', '=', 'rack_tbls.id')
        ->leftJoin('tran_tbls', 'parts_lists.sku', '=', 'tran_tbls.sku')
        ->leftJoin('branch_tbls', 'tran_tbls.location', '=', 'branch_tbls.id')
        ->where('parts_lists.sku' ,$sku)
        ->first();

        $stock_in = DB::table('tran_tbls')
        ->leftJoin('parts_lists', 'parts_lists.sku', '=', 'tran_tbls.sku')
        ->where('location' ,$user_id)
        ->where('parts_lists.sku' ,$sku)
        ->where('types' ,0)
        ->sum('quantity');

        $stock_out = DB::table('tran_tbls')
        ->leftJoin('parts_lists', 'parts_lists.sku', '=', 'tran_tbls.sku')
        ->where('location' ,$user_id)
        ->where('parts_lists.sku' ,$sku)
        ->where('types' ,1)
        ->sum('quantity');
        $total = $stock_in - $stock_out;
        return view('remove.store', ['row' => $row , 'total' => $total]);
    }

    public function edit_parts($sku)
    {
        $areas = DB::table('rack_tbls')
        ->where('stats', '=', 0)
        ->orderBy('rack','asc')
        ->get();
        $brands = DB::table('brand_tbls')
        ->where('stats', '=', 0)
        ->orderBy('brand','asc')
        ->get();
        $units = DB::table('unit_tbls')
        ->orderBy('unit','asc')
        ->get();
        $row = DB::table('parts_lists')
        ->leftJoin('rack_tbls', 'parts_lists.r_id', '=', 'rack_tbls.id')
        ->leftJoin('brand_tbls', 'parts_lists.b_id', '=', 'brand_tbls.id')
        ->leftJoin('unit_tbls', 'parts_lists.u_id', '=', 'unit_tbls.id')
        ->where('parts_lists.sku' ,$sku)
        ->first();
        return view('add.edit',[
            'row' =>$row,
            'areas' =>$areas,
            'brands' =>$brands,
            'units' =>$units
        ]);
    }

    public function edit_trans($id)
    {
        $partsData = Tran_tbl::find($id);
        return response()->json([
           'partsData' =>$partsData,
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $sku)
    {
        $min = !empty($ocs)  ? $request->over : 1;
        $request->validate([
            'part_name' => 'required',
        ]);
        DB::table('parts_lists')
        ->where('sku', $sku)
        ->update([
            'details' => $request->part_name,
            'partno' => $request->part_no,
            'serialno' => $request->serial,
            'r_id' => $request->rack,
            'b_id' => $request->brand,
            'u_id' => $request->unit,
            'min_stock' => $min,
            'comments' => $request->summary,
        ]);
        // return redirect()
        // ->route('edit_parts')
        return back()
        ->with('success',''.ucwords($request->part_name).' has been update successfully.');
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
