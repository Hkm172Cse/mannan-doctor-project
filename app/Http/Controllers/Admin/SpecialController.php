<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Specialist;
use Illuminate\Http\Request;

class SpecialController extends Controller
{
    public function index(){
        $data = Specialist::all();
        return view('Backend.specialist.list', ['specialists'=>$data]);
    }

    public function AddSpecial(){
        return view('Backend.specialist.add');
    }

    public function InsertSpecial(Request $request){
        $result = Specialist::insert([
            'title'=>$request->title,
            'bangla_title'=>$request->bangla_title
        ]);
        if($result){
            return redirect()->route('admin.spacialist');
        }else{
            return redirect()->back();
        }
    }

    public function EditSpacialist($id){
        dd($id);
    }



}
