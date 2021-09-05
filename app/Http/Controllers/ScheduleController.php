<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\schedule;
use DB;

class ScheduleController extends Controller
{
    public function schedule()
    {
        $result = DB::table('schedules')->get(); 
        return view('form.schedule',compact('result'));
    }

    public function saveRecord(Request $request)
     {

               $request->validate([
                 'shift' => 'required|string|max:255',
                 'timeIn' => 'required|time',
                 'timeOut' => 'required|time',
               ]);

                //DB::beginTransaction();
                //try{
                $schedule = new Schedule;
                $schedule->shift = $request->shift;
                $schedule->time_in = $request->timeIn;
                $schedule->day = $request->timeOut;
                $schedule->save(); 
                // DB::commit();
               // Toastr::success('created new holiday succesfully)','Success');
              // return redirect()->back();
             // }catch(\Exception $e){
               // DB::rollback();
               // Toastr::error('Add holiday fail)','Error');
                return redirect()->back();
              //}
                
               
     }
}
