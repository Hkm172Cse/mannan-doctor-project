<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Settings;
use App\Models\User;
use App\Models\UserLocationInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('Backend.admin.dashboard');
    }

    public function change_password(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        $user_id  = Auth::user()->id;
        $response=User::where('id', $user_id)->update([
            'password' => Hash::make($request->password)
        ]);
        if ($response) {
            return redirect()->back()->with('success', 'Password changed successfully');
        } else {
            return redirect()->back()->with('error', 'Somthing wrong. please try again');
        }
    }

    public function profile(){
        return view('admin.profile.profile');
    }

    public function profile_update(Request $request){
        $request->validate([
            'name'=>'required'
        ]);
        $user_id=Auth::user()->id;
        if($request->hasFile('image')){
            $image_name=Helper::uploadDocument('profile',$request->file('image',Auth::user()->image))['filePath'];
        }else{
            $image_name=Auth::user()->image;
        }
       
        $response=User::where('id',$user_id)->update([
            'name'=>$request->name,
            'image'=>$image_name
        ]);
        if ($response) {
            return redirect()->back()->with('success', 'Profile updated successfully');
        } else {
            return redirect()->back()->with('error', 'Somthing wrong. please try again');
        }
    }

    public function user_access_info(){
        $user_acces_data = UserLocationInformation::orderBy('id','desc')
        ->paginate(30);
        if (isset(request()->page)) {
            return view('admin.user.tables.user_acces_info_table', compact('user_acces_data'));
        }
        return view('admin.user.user_access_info',compact('user_acces_data'));
    }

    public function settings(){
        return view('admin.settings.settings');
    }
    public function settings_save(Request $request){
        
        $status=$request->status;
        $setting = Settings::where('status',$status)->first();
        if($status=='stripe'){
            $content=[
                "publishable_key"=>$request->publishable_key,
                "store_price_id"=>$request->store_price_id,
                "tradie_price_id"=>$request->tradie_price_id
                // "secret_key"=>$request->secret_key
            ];
            $data=[
                "status"=>$status,
                "content"=>json_encode($content)
            ];
            if($setting){
                $setting->update($data);
            }else{
                Settings::create($data);
            }
        }

        return redirect()->back();
    }
    public function Email_settings_save(Request $request){
        $status=$request->status;
        $setting = Settings::where('status',$status)->first();
        if($status=='mail'){
            $content=[
                "mail_mailer"=>$request->mail_mailer,
                "mail_host"=>$request->mail_host,
                "mail_port"=>$request->mail_port,
                "mail_username"=>$request->mail_username,
                "mail_password"=>$request->mail_password,
                "mail_encryption"=>$request->mail_encryption
            ];
            $data=[
                "status"=>$status,
                "content"=>json_encode($content)
            ];
            if($setting){
                $setting->update($data);
            }else{
                Settings::create($data);
            }
        }

        return redirect()->back();
    }
}
