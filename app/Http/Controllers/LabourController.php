<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Labour;
use App\Models\Employee;
use DB;
use Carbon\Carbon;

class LabourController extends Controller
{
    public function labour()
    {
        $result = DB::table('labours')->get();
        return view('labour.labour',compact('result'));
    }

    // save record
    public function saveRecord(Request $request)
    {
        $todaylabours = Labour::whereDate('request_date', now())->get();

        $labour = new Labour;
        $labour->turnmen = $request->input('turnmen');
        $labour->bob_cat_operator = $request->input('bob_cat_operator');
        $labour->bulk_loader = $request->input('bulk_loader');
        $labour->trimming_gang = $request->input('trimming_gang');
        $labour->turnmen = $request->input('cargil_clerk');

        if ($total )
        $total = $turnmen + $bob_cat_operator + $bulk_loader + $trimming_gang + $cargil_clerk;
        $labour->save();
        return redirect()->back(); 
    }
}
