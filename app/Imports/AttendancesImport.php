<?php

namespace App\Imports;

use App\Models\Attendance;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class AttendancesImport implements ToModel, WithHeadingRow, WithValidation
{

    public function rules(): array
    {
        //$todayAttendances = Attendance::whereDate('created_at', now())->get();
        return [
            
            //'created_at'   => 'required',
            'national_id' => 'required|unique:employees',
            'name'        => 'required',
            'designation' => 'required',
            'location'    => 'required',
         ];
    }
    
    //use Importable, SkipsErrors;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
       // $todayAttendances = Attendance::whereDate('created_at', now())->get();
        return new Attendance([
            //'created_at'  => date('d M, Y', strtotime($row['created_at'])),
            'national_id' => $row['national_id'],
            'name'        => $row['name'],
            'designation' => $row['designation'], 
            'location'    => $row['location'],
        ]);
    }

    public function load(Throwable $load){}

    
}
