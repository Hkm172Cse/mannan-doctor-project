<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Serial;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LayoutController extends Controller
{
    public function homePage(){
        $doctors_data = Doctor::all();
        $specialist = Specialist::all();
        return view('Frontend.Pages.Home.Home', ['doc_data'=>$doctors_data, 'specialists'=>$specialist]);
    }

    public function DoctorDetails($id){
        $data =  DB::table('doctors')
        ->leftJoin('specialists', 'doctors.specialist', '=', 'specialists.id')
        ->select('doctors.*', 'specialists.bangla_title')
        ->where('doctors.id',$id)->get();
        return view('Frontend.Pages.doctor.details', ['data'=>$data]);
    }

    public function BookSerial(Request $request){
        $chember = json_decode($request->chember);
        $id = $request->id;
        return view('Frontend.Pages.doctor.booking', ['chember'=>$chember, 'id'=>$id]);
    }

    public function SerialBooking(Request $request){
        $result = Serial::insert([
            'nid'=>$request->nid,
            'name'=>$request->name, 
            'phone'=>$request->phone, 
            'doctor_id'=>$request->doctor_id, 
            'chember'=>$request->chember]);
        if($result){
            return redirect()->back()->with('success', 'আপনার  সিরিয়ালটি নেওয়া হয়েছে। অতি শিঘ্রয় আপনার সাথে যোগাযোগ করা হবে। দয়া করে অপেক্ষা করুন');
        }else{
            return redirect()->back()->with('fail', 'আপনার  সিরিয়ালটি নেওয়া হয়নি। সকল তথ্য দিয়ে আবার চেষ্টা করুন');  
        }
    }
}
