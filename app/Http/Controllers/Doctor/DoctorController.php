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
        $data = Serial::where('doctor_id', $id)->get();
        return view('Backend.doctor.serials', ['data'=>$data]);
    }  

    public function ChamberList(){
        $id = Auth::guard('doctor')->user()->id;
        $data = Chember::where('doctor_id',$id)->get();
        return view('Backend.doctor.chamber.list', ['data'=>$data]);
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
    public function Delete($id){
        dd($id);
    }
}
