<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Employee;
use Carbon\Carbon;
//use App\Models\User;

class EmployeeController extends Controller
{
    public function employees()
    {
        $employees = Employee::all() ;
        
        return view('employee',['employees'=>$employees,'layout'=>'employee']);
        
    }
    // all employee card view
    public function cardAllEmployee()
    {
        $result = DB::table('employees')
                    ->get(); 
        return view('form.allemployeecard',compact('result'));
    }
    // all employee list
    public function listAllEmployee()
    {
        $result = DB::table('employees')
                    ->get();
        return view('form.employeelist',compact('result'));
    }

    // save data employee
    public function saveRecord(Request $request)
    {
        $request->validate([
            'national_id' => 'required|string|max:8',
            'name'        => 'required|string|max:255',
            'gender'      => 'required|string|max:10',
        ]);

        $todayEmployees = Employee::whereDate('created_at', now())->get(); 
                
        DB::beginTransaction();
        try{
                $employee = new Employee;
                $employee->national_id = $request->national_id;
                $employee->name        = $request->name;
                $employee->gender      = $request->gender;
                $employee->save();
                DB::commit();
                Toastr::success('created new employee succesfully)','Success');
                return redirect()->back();
              }catch(\Exception $e){
                DB::rollback();
                Toastr::error('Add employee fail)','Error');
                return redirect()->back();
              }
         
    }
}
