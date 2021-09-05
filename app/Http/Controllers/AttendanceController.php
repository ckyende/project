<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
//use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Validation\ValidatesRequests;
//use Maatwebsite\Excel\Facades\Excel;
use App\Models\Attendance;
use App\Imports\AttendancesImport;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use DB;
use Excel;
use Validator;
use Importer;


class AttendanceController extends Controller
{

    public $attendances;
    
    public function attendance()
    {
     $data = DB::table('attendances')->get();
     return view('form.attendance',compact('data'));

    }
    
    public function import(Request $request)
    {
      //$request->validate([
      //'file'  => 'required|max:5000|mimes:xls,xlsx',
     //  ]);
     $this->validate($request, [
        'file'  => 'required|mimes:xls,xlsx'
       ]);

       $dt       = Carbon::now();
        $todayDate = $dt->toDayDateTimeString();

     //$todayAttendances = Attendance::whereDate('created_at', now())->get();
     Excel::import(new AttendancesImport(), $request->file('file')->store('upload'));
    
     return back()->with('success', 'Excel Data Imported successfully.');
   

    }

}