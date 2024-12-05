<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Chember;
use App\Models\Doctor;
use App\Models\Serial;
use App\Models\Specialist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function Profile(){
        $id = Auth::guard('doctor')->user()->id;
        $data = Doctor::where('id',$id)->get();
        $specialist = Specialist::all();
        return view('Backend.doctor.profile', ['data'=>$data, 'specialist'=>$specialist]);
    }

    public function UpdateProfile(Request $request){
        $id = $request->edit_id;
        //dd($request->all());
        $inputs = $request->only(
            'name','email','phone','specialist','degree','present_w_p','previous_w_p','visit_fee','chembar','bmdc','details','special_trainig'
        );
        if($request->hasFile('image')){
            $media_path = 'images/';
            $media_file = $request->file('image');
            $inputs['image'] = Helper::uploadDocument($media_path, $media_file, null)['filePath'];
        }
        $result = Doctor::where('id',$id)->update($inputs);
        if($result){
            return redirect()->back();
        }

    }

    public function AddChamber(Request $request){
            $id = Auth::guard('doctor')->user()->id;
            $oldChambers = Doctor::find($id);
            if($oldChambers->chembar != null){
                $Chambers = json_encode($oldChambers->chembar).",".json_encode($request->all());   
            }else{
                $Chambers = json_encode($request->all());
            }
            $chambersArr = [$Chambers];
            $TestChambers = json_encode($chambersArr);
           $result  = Doctor::where('id',$id)->update(['chembar'=>$TestChambers]);
        if($result){
            $response = [
                'status'=>true,
                'data'=>$TestChambers
            ];
        }else{
            $response = [
                'status'=>false,
                'message'=>"Chamber not added"
            ];
        }

        // $response = [
        //     'status'=>true,
        //     'data'=>$oldChambers->chembar
        // ];
        return response()->json($response);
    }

    public function AddChamberTest(Request $request){
        $id = Auth::guard('doctor')->user()->id;
        $oldChambers = Doctor::find($id);
        $chambers = json_decode($oldChambers->chembar);
        //return response()->json($chambers);
        if (!is_array($chambers)) {
            $chambers = [];
        }
        $chambers[] = $request->only(['name', 'address', 'time']);
        $oldChambers->update(['chembar' => $chambers]);
        $response = [
            'status'=>true,
            'data'=>$request->all()
        ];
        return response()->json($response);
   
    }

    public function DoctorSearch(Request $request){
        $search = $request->search;
        if($search){
            $data = Doctor::where('name','like', '%'.$search.'%')->get();
            $response = [
                'status'=>true,
                'data'=>$data
            ];
        }else{
            $response = [
                'status'=>false,
                'data'=> 0
            ];
        }
        
        return response()->json($response);
    }

    public function SerialList(){
        $id = Auth::guard('doctor')->user()->id;
        $data = DB::table('serials')
        ->leftJoin('chembers', 'serials.chember', '=', 'chembers.id')
        ->select('chember', 'chembers.name')
        ->groupBy('serials.chember', 'chembers.name')
        ->where('serials.doctor_id', $id)
        ->get();
        return view('Backend.doctor.serials', ['data'=>$data]);
    }  

    public function ChamberList(){
        $id = Auth::guard('doctor')->user()->id;
        $data = Chember::where('doctor_id',$id)->get();
        return view('Backend.doctor.chamber.list', ['data'=>$data]);
    }

    public function ChamberAdd(){
        return view('Backend.doctor.chamber.add');
    }

    public function SerialEdit($id){
        dd($id);
    }

    public function ChamberEdit($id){
        $data = Chember::where('id',$id)->get();
        $activeDays = json_decode($data[0]->active_days);
        return view('Backend.doctor.chamber.edit', ['data'=>$data, 'activeDays'=>$activeDays]);
    }

    public function ChemberUpdate(Request $request){
        $inputs = $request->only(
            'name',
            'address',
            'start_time',
            'end_time'
        );
        $inputs['active_days'] = json_encode($request->active_days);
        $result = Chember::where('id', $request->edit_id)->update($inputs);
        if($result){
            return redirect()->back()->with('success', 'Chembar update success');
        }else{
            return redirect()->back()->with('fail', 'Chembar update failed');
        }
    }

    public function ChamberInsert(Request $request){
        $doctor_id = Auth::guard('doctor')->user()->id;
        $inputs = $request->only(
            'name',
            'address',
            'start_time',
            'end_time'
        );
        $inputs['active_days'] = json_encode($request->active_days);
        $inputs['doctor_id'] = $doctor_id;
        $result = Chember::insert($inputs);
        if($result){
            return redirect()->route('doctor.chamber.list')->with('success', 'Chembar update success');
        }else{
            return redirect()->route('doctor.chamber.list')->with('fail', 'Chembar update failed');
        }
    }
    public function Delete($id){
        dd($id);
    }

    public function ChamberPatients($chamberId){
        $doctor_id = Auth::guard('doctor')->user()->id;
        $chamberInfo = Chember::where('id', $chamberId)->get();
        $activeDays = $chamberInfo[0]->active_days;
        $activeDays = json_decode($activeDays);
        return view('Backend.doctor.chamber.chamber_days', ['days'=>$activeDays, 'doctor_id'=>$doctor_id, 'chamber_id'=>$chamberId]);
        
        // $data = Serial::where('doctor_id',$doctor_id)->where('chember',$id)->get();
        // return view('Backend.doctor.chamber.chamber_patients', ['data'=>$data]);
    }

    public function ChamberDateWise($doctor, $date,$chamber){
        $data = Serial::where('date',$date)
        ->where('doctor_id', $doctor)
        ->where('chember', $chamber)
        ->where('status', 'pending')
        ->orderBy('serial_number', 'asc')->get();
        return view('Backend.doctor.chamber.chamber_patients', ['data'=>$data, 'doctor_id'=>$doctor, 'date'=>$date,'chamber_id'=>$chamber]);
    }

    public function StartToSeePatients($doctor, $date,$chamber){
        $getCurrectPatient = Serial::where('date',$date)
        ->where('doctor_id', $doctor)
        ->where('chember', $chamber)
        ->where('status', 'pending')
        ->orderBy('serial_number', 'asc')->first();
        //dd($getCurrectPatient);
        if($getCurrectPatient == null){
            return redirect()->back()->with('completed', "All patients completed");
        }
        return view('Backend.doctor.chamber.current_patient', ['currentPatient'=>$getCurrectPatient, 'doctor_id'=>$doctor, 'date'=>$date,'chamber_id'=>$chamber]);

    }

    public function statusCompleted($doctor, $date, $chamber, $patient_id){
        $updateStatus = Serial::where('id', $patient_id)->update(['status'=>"completed"]);

        $getCurrectPatient = Serial::where('date',$date)
        ->where('doctor_id', $doctor)
        ->where('chember', $chamber)
        ->where('status', 'pending')
        ->orderBy('serial_number', 'asc')->first();
        if($getCurrectPatient == null){
            return redirect()->route('admin.chembers.day.patients', ['doctor_id'=>$doctor, 'date'=>$date,'chamber_id'=>$chamber])->with('completed', "All patients completed");
        }
        return view('Backend.doctor.chamber.current_patient', ['currentPatient'=>$getCurrectPatient, 'doctor_id'=>$doctor, 'date'=>$date,'chamber_id'=>$chamber]);

    }

    public function statusSkip($doctor, $date, $chamber, $patient_id, $serial){

        $skip_serail = $serial + 3;
        $getLastPatient = Serial::where('date',$date)
        ->where('doctor_id', $doctor)
        ->where('chember', $chamber)
        ->where('status', 'pending')
        ->orderBy('serial_number', 'desc')->first();
        $lastSerialNumber = $getLastPatient->serial_number;
        //$skip_count =
        if($skip_serail >= $lastSerialNumber){
            $skip_serail = $lastSerialNumber;
        }
        
        $serialSkiped = $this->serialSkipHandler($serial, $skip_serail, $doctor, $date, $chamber, $patient_id);
        if($serialSkiped == 1){
            $getCurrectPatient = Serial::where('date',$date)
            ->where('doctor_id', $doctor)
            ->where('chember', $chamber)
            ->where('status', 'pending')
            ->orderBy('serial_number', 'asc')->first();
            return view('Backend.doctor.chamber.current_patient', ['currentPatient'=>$getCurrectPatient, 'doctor_id'=>$doctor, 'date'=>$date,'chamber_id'=>$chamber]);
        }

    }

    public function serialSkipHandler($currentSerial, $skipSerial, $doctor, $date, $chamber, $patient_id){
        if($currentSerial == $skipSerial){
            return 0;
        }
        $skip_count = Serial::where('id',$patient_id)->first();
        $skip_count = $skip_count->skip_count;
        if($skip_count>0){
            $skipSerial = $skipSerial * ($skip_count + 1);
        }
        
       for($i = $currentSerial; $i< $skipSerial; $i++){
        Serial::where('date',$date)
        ->where('doctor_id', $doctor)
        ->where('chember', $chamber)
        ->where('status', 'pending')
        ->where('serial_number', $i+1)
        ->update(['serial_number'=>$i]);
       }
       $changing = Serial::where('id', $patient_id)->update(['serial_number'=>$skipSerial, 'skip_count'=>$skip_count + 1]);
       if($changing){
        return 1;
       }
        
    }

    public function OldPatients(){
        $doctor_id = Auth::guard('doctor')->user()->id;
        $data = Serial::where('doctor_id',$doctor_id)->where('status', 'completed')->get();
        return view('Backend.doctor.chamber.old_patients', ['data'=>$data]);
    }
}
