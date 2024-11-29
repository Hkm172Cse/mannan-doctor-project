<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Chember;
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
        $chamberData = Chember::where('doctor_id',$id)->get();
        return view('Frontend.Pages.doctor.details', ['data'=>$data, 'chamberData'=>$chamberData]);
    }

    public function BookSerial(Request $request){
        $chember = $request->chember;
        $doctorsActiveDays = Chember::where('id',$chember)->get();
        $doctorsActiveDays = $doctorsActiveDays[0]->active_days;
        //dd($doctorsActiveDays);
        $id = $request->id;
        return view('Frontend.Pages.doctor.booking', ['chember'=>$chember, 'id'=>$id, 'activeDays'=>$doctorsActiveDays]);
    }

    public function SerialBooking(Request $request){
        //dd($request->all());
        $chamber = json_decode($request->chember);
        $date = $request->date;
        $limit_cross = Serial::where('date',$date)->where('chember',$chamber)->count();
        if($limit_cross >= 50){
            return redirect()->back()->with('fail', 'আপনার সিরিয়ালটি নেওয়া হচ্ছে না  ইতিমধ্যে আমরা প্রতিদিনের জন্যে নির্ধারিত রোগীর সিরিয়াল নেওয়া শেষ। দয়া করে অন্য তারিখ বা চেম্বার নির্বাচন করুন।');
        }else{

        $serial_number = $limit_cross + 1;
        $result = Serial::insert([
            'nid'=>$request->nid,
            'name'=>$request->name, 
            'phone'=>$request->phone, 
            'doctor_id'=>$request->doctor_id, 
            'chember'=>$chamber,
            'date'=>$date,
            'birth_date'=>$request->birth_date,
            'serial_number'=>$serial_number
        ]);
        if($result){
            return redirect()->back()->with('success', 'আপনার  সিরিয়ালটি নেওয়া হয়েছে। অতি শিঘ্রয় আপনার সাথে যোগাযোগ করা হবে। দয়া করে অপেক্ষা করুন এবং আপনার সিরিয়াল নম্বরটি মনে রাখুন। আপনার সিরিয়াল নম্বরটি '.$serial_number);
        }else{
            return redirect()->back()->with('fail', 'আপনার  সিরিয়ালটি নেওয়া হয়নি। সকল তথ্য দিয়ে আবার চেষ্টা করুন');  
        }
    }
    }
}
