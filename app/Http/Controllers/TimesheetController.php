<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Timesheet;
use App\Models\Employee;
use DB;
use Carbon\Carbon;


class TimesheetController extends Controller
{
    public function timesheet()
    {
        $employees = DB::table('employees')
                    ->join('timesheets', 'timesheets.national_id', '=', 'employees.national_id')
                    ->select('employees.*', 'employees.name')
                    ->get(); 
        $employeeList = DB::table('employees')->get();
        return view('timesheet.timesheet',compact('employees','employeeList'));
    }
    // all employee list
    public function attendance()
    {
        $employees = DB::table('employees')
                    ->join('timesheets', 'timesheets.national_id', '=', 'employees.national_id')
                    ->select('employees.*', 'employees.name')
                    ->get();
        $employeeList = DB::table('employees')->get();
        return view('timesheet.timesheet',compact('employees','employeeList'));
    }

    // save data employee
    public function saveRecord(Request $request)
    {
        $request->validate([
            'date'        => 'required|string|max:255',
            'national_id' => 'required|string|max:255',
            'name'        => 'required|string|max:255',
            'time_in'     => 'required|string|max:255',
            'time_out'    => 'required|string|max:255',
           // 'gender'      => 'required|string|max:255',
            //'company'     => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try{

            $timesheets = Employee::where('national_id', '=',$request->national_id)->first();

            if ($timesheets === null)
            {
                $timesheet = new Employee;
                $timesheet-> date        = $request->date;
                $timesheet->national_id  = $request->national_id;
                $timesheet->name         = $request->name;
                $timesheet->time_in      = $request->time_in;
                $timesheet->time_out     = $request->time_out;
                $timesheet->save();
                
                DB::commit();
                Toastr::success('Add new employee successfully :)','Success');
                return redirect()->route('timesheet');
            } else {
                DB::rollback();
                Toastr::error('Add new employee exits :)','Error');
                return redirect()->back();
            }
        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Add new employee fail :)','Error');
            return redirect()->back();
        }
    }
    // view edit record
    public function viewRecord($national_id)
    {
        $timesheets = DB::table('timesheets')->where('national_id',$national_id)->get();
        return view('edit.edittimesheet',compact('timesheets'));
    }
    
}


