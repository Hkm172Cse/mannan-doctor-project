<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Serial;
use Illuminate\Http\Request;

class PatientsController extends Controller
{
    public function GetSerial(){
        return view('Frontend.Pages.patient.serial_form');
    }

    public function InsertSerial(Request $request){
        $result = Serial::insert([
            'nid'=>$request->nid,
            'name'=>$request->name,
            'phone'=>$request->phone
        ]);
        if($result){
            return redirect()->back()->with("success", "সিরিয়াল সাবমিট সাকসেস");
        }
    }
}
