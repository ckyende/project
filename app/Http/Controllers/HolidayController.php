<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Holiday;
use Carbon\Carbon;
use DB;

class HolidayController extends Controller
{
     // holidays
     //public $holiday;
     public function holiday()
       {

                //$holiday = 'holiday';
                $holidays = Holiday::all() ;
               // return view('form.holidays',['holidays'=>$holidays,'layout'=>'holiday']);
                
                $result = 'result';
                $result = DB::table('holidays')->get(); 
                return view('form.holidays',compact('result'));
       }


     // save record
     public function saveRecord(Request $request)
     {

               $request->validate([
                 'holidayName' => 'required|string|max:255',
                 'holidayDate' => 'required|string|max:255',
               ]);

                DB::beginTransaction();
                try{
                $holiday = new Holiday;
                $holiday->holiday_name = $request->holidayName;
                $holiday->holiday_date = $request->holidayDate;
                $holiday->day = $request->day;
                $holiday->save(); 
                 DB::commit();
                Toastr::success('created new holiday succesfully)','Success');
                return redirect()->back();
              }catch(\Exception $e){
                DB::rollback();
                Toastr::error('Add holiday fail)','Error');
                return redirect()->back();
              }
                
                  
     }
}
