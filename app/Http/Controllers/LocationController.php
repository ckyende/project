<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\location;
use DB;

class LocationController extends Controller
{

    public function location()
    {
       $result = DB::table('locations')->get(); 
       return view('form.location',compact('result'));
    }
    // save record
    public function store(Request $request)
    {
       
        $location = new Location;
        $location->id;
        $location->location_name = $request->locationName;
        $location->save();
        return redirect()->back();      
    }
}