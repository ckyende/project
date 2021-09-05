<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\position;
use DB;

class PositionController extends Controller
{
    // designations
     //public $positions;
     public function position()
     {
        $result = DB::table('positions')->get(); 
        return view('form.position',compact('result'));
     }
     // save record
     public function saveRecord(Request $request)
     {
        
             $position = new Position;
             $position->position_name  = $request->positionName;
             $position->normal_rate    = $request->normal_rate;
             $position->overtime_rate  = $request->overtime_rate;
             $position->holiday_rate   = $request->holiday_rate;
             $position->ppe_cost       = $request->holiday_rate;
             $position->management_fee = $request->holiday_rate;
             $position->save();
             return redirect()->back();      
     }
}
